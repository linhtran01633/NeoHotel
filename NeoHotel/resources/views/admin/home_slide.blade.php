@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {},
        array_img: [],
        data_error: {},
        isSave : false,
        message_save: "",
        array_img_mobile : [],
        isSubmitting: false,
        submitForm: function() {
            this.isSubmitting = true;
            let url_post = "{{ route("admin.home_slide.save") }}";

            let form_data = new FormData();

            for (let key in this.data) {
                if (this.data.hasOwnProperty(key)) {
                    console.log(key);
                    form_data.append(key, this.data[key]);
                }
            }

            let imageFile = document.querySelector("#image_extra").files[0];
            if (imageFile) {
                form_data.append("images", imageFile);
            }

            let imageFileMobile = document.querySelector("#image_extra_mobile").files[0];
            if (imageFileMobile) {
                form_data.append("images_mobile", imageFileMobile);
            }


            fetch(url_post, {
                method: "POST",
                headers: {
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.head.querySelector("meta[name=csrf-token]").content
                },
                body: form_data,
            })
            .then((response) => response.json())
            .then(data => {
                this.message_save = data.message
                if(data.success == true) {
                    this.reloadTable();
                    window.scrollTo({
                        top: 0,
                        behavior: "smooth" // Cuộn mượt mà
                    });
                } else {
                    this.data_error = Object.fromEntries(
                        Object.entries(data.errors).map(([key, value]) => [key, value[0]])
                    );
                }
                this.isSubmitting = false;
            }).catch((error) => {
                console.error("Error:", error)
                this.isSubmitting = false;
            });
        },
        reloadTable: function() {
            $("#data_table").DataTable().ajax.reload();
        },
        openPopup: function() {
            this.data = {};
            this.array_img = [];
            this.data_error = {};
            this.message_save = "";
            this.array_img_mobile = [];
            this.isSave = !this.isSave;
        },
        editRow: function(id) {
            console.log(id);
            this.data_error = {};
            this.message_save = "";

            let url_post = "{{ route("admin.infomation_home_slide") }}";

            fetch(url_post, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.head.querySelector("meta[name=csrf-token]").content
                },
                body: JSON.stringify({id : id}),
            })
            .then((response) => response.json())
            .then(data => {
                console.log(data)
                this.data = data;
                this.isSave = true;
                this.array_img = data.images.split(",");
                this.array_img_mobile = data.images_mobile.split(",");
                window.scrollTo({
                    top: 0,
                    behavior: "smooth" // Cuộn mượt mà
                });

            }).catch((error) => {
                console.error("Error:", error)
            });
        },
        editDelete: function(id) {
            let url_post = "{{ route("admin.delete.home_slide") }}";

            fetch(url_post, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.head.querySelector("meta[name=csrf-token]").content
                },
                body: JSON.stringify({id : id}),
            })
            .then((response) => response.json())
            .then(data => {
                this.reloadTable();
            }).catch((error) => {
                console.error("Error:", error)
            });
        }
    }'>
        <button type="button" x-on:click="openPopup" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Slide
        </button>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Table Slide</h1>
            <div class="w-full">
                <table id="data_table" class="w-full border border-gray-300 table-auto">
                    <thead>
                        <tr class="bg-sidebar text-white">
                            <th class="py-2 px-4 border-b">ID</th>
                            <th class="py-2 px-4 border-b">Name</th>
                            <th class="py-2 px-4 border-b">Title</th>
                            <th class="py-2 px-4 border-b">Option</th>
                        </tr>
                    </thead>

                </table>
            </div>

        <!-- Popup edit -->
        <div x-show="isSave" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle w-full">
                    <div class="w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="w-full">
                                <div class="mt-3 sm:mt-0 sm:ml-4 text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Slide</h3>
                                    <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                                    <div class="mt-2">
                                        <input type="hidden" x-model="data.id" >
                                        <input type="color" x-model="data.color_mobile">
                                        <span>select name color on mobile interface</span>

                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>Name VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.name_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_vn"></div>
                                            </div>
                                            <div>
                                                <div>Name English</div>
                                                <div>
                                                    <input type="text" x-model="data.name_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_en"></div>
                                            </div>
                                            <div>
                                                <div>Name Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.name_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>Title VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.title_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.title_vn"></div>
                                            </div>
                                            <div>
                                                <div>Title English</div>
                                                <div>
                                                    <input type="text" x-model="data.title_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.title_en"></div>
                                            </div>
                                            <div>
                                                <div>Title Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.title_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.title_jp"></div>
                                            </div>
                                        </div>

                                        <div>Image on pc (Only 1 image can be selected)</div>
                                        <div class="my-2 grid grid-cols-1 gap-4">
                                            <div>
                                                <input type="file"  id="image_extra" accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.images"></div>
                                            <div class="mt-2 flex items-center flex-warp" id="preview_image_extra">
                                                <template x-for="(value, key) in array_img" :key="key">
                                                    <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                        <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                                    </div>
                                                </template>
                                            </div>
                                        </div>

                                        <div>Image on sm (Only 1 image can be selected)</div>
                                        <div class="my-2 grid grid-cols-1 gap-4">
                                            <div>
                                                <input type="file" id="image_extra_mobile" accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.images_mobile"></div>
                                            <div class="mt-2 flex items-center flex-warp" id="preview_image_extra_mobile">
                                                <template x-for="(value, key) in array_img_mobile" :key="key">
                                                    <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                        <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                                    </div>
                                                </template>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" :disabled="isSubmitting" x-on:click="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                            <button type="button" x-on:click="isSave = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var CallDataTableURL = '{!! route('admin.home_slide') !!}';
            var table = $('#data_table').DataTable({
                paging: true,
                pagingType: 'simple',
                pageLength: 10,
                scrollX: true,
                processing: true,
                serverSide: false,
                searching: false,
                autoWidth: false,
                ajax: {
                    url: CallDataTableURL, // Đường dẫn đến API hoặc tệp tin JSON cung cấp dữ liệu
                    headers: {
                        "X-CSRF-TOKEN": $("meta[name=csrf-token]").attr("content"),
                    },
                    data: function(d){
                    },
                    dataSrc: "" // Dữ liệu được trả về dưới dạng một mảng JSON
                },
                columns: [
                    {
                        data: "id",
                        defaultContent: "",
                        className: "text-center",
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.name_vn}</div>
                                <div>${row.name_en}</div>
                                <div>${row.name_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.title_vn}</div>
                                <div>${row.title_en}</div>
                                <div>${row.title_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        className: "dt-center editor-delete flex justify-start",
                        render : function ( data, type, row ) {
                            let html =  `
                                <button type="button" x-on:click="editRow('${row.id}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                    EDIT
                                </button>
                                 <button type="button" x-on:click="editDelete('${row.id}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                    Delete
                                </button>
                                `;

                            return html;
                        }
                    }
                ],
            });

            var check_preview_image_extra = document.getElementById('image_extra');
            if(check_preview_image_extra) {
                document.getElementById('image_extra').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_image_extra');
                    preview.innerHTML = ''; // Xóa bất kỳ hình ảnh trước đó nào trong phần xem trước

                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        if (file) {
                            let reader = new FileReader();

                            reader.onload = function(e) {
                                preview.innerHTML += `
                                    <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                        <img class="w-full h-full rounded-lg show_enlarge" data-src="${e.target.result}" src="${e.target.result}" alt="Preview">
                                    </div>
                                `;
                            }

                            reader.readAsDataURL(file);
                        }
                    }
                });
            }

            var check_preview_image_extra_mobile = document.getElementById('image_extra_mobile');
            if(check_preview_image_extra_mobile) {
                document.getElementById('image_extra_mobile').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_image_extra_mobile');
                    preview.innerHTML = '';

                    for (let i = 0; i < files.length; i++) {
                        let file = files[i];
                        if (file) {
                            let reader = new FileReader();

                            reader.onload = function(e) {
                                preview.innerHTML += `
                                    <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                        <img class="w-full h-full rounded-lg show_enlarge" data-src="${e.target.result}" src="${e.target.result}" alt="Preview">
                                    </div>
                                `;
                            }

                            reader.readAsDataURL(file);
                        }
                    }
                });
            }


            $(document).on('click', '.close_images', function(e) {
                $(this).parent().parent().remove();
            });

            $(document).on('click', '.show_enlarge', function(e) {
                // Tạo chuỗi HTML chứa div mới
                var newDivHTML = `
                    <div class="fixed z-50 w-full h-full">
                        <div  class="relative mx-auto mt-16 border border-gray-300 rounded-lg mx-2 shadow bg-white" style="width:50%; aspect-ratio: 5/4">
                            <button type="button" class="close_images absolute top-0 right-0 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>
                            <img src="${$(this).data('src')}" alt="Preview" class="rounded-lg w-full h-full">
                        </div>
                    </div>`;

                // Thêm chuỗi HTML vào sau phần tử cuối cùng của body
                document.body.insertAdjacentHTML('beforeend', newDivHTML);
            });
        });
    </script>
@endsection
