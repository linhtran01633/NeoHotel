@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {!! htmlspecialchars(json_encode($data ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        array_images : {!! htmlspecialchars(json_encode($array_images ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        array_service : {!! htmlspecialchars(json_encode($array_service ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        data_error: {},
        isSave : false,
        message_save: "",
        isSubmitting: false,
        submitForm: function() {
            this.isSubmitting = true;
            let url_post = "{{ route("admin.service.save") }}";
            let form_data = new FormData();

            for (let key in this.data) {
                if (this.data.hasOwnProperty(key)) {
                    form_data.append(key, this.data[key]);
                }
            }

            this.array_service.forEach(service => {
                form_data.append("service_list[]", JSON.stringify(service));
            });

            if(this.array_service.length == 0) {
                form_data.append("service_list", null);
            }

            let images = document.querySelector("#images").files;
            if (images.length > 0) {
                for (let i = 0; i < images.length; i++) {
                    form_data.append("images[]", images[i]);
                }
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
                    this.data_error = {};
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
        addService: function() {
            this.array_service.push({
                "title_service_vn": "",
                "title_service_en": "",
                "title_service_jp": "",
                "comment_service_vn": "",
                "comment_service_en": "",
                "comment_service_jp": "",
            });
        },
        removeService: function(index) {
            if (index > -1) {
                this.array_service.splice(index, 1);
            }
        }
    }'>

        <div class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-full">
            <div class="w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="w-full">
                        <div class="mt-3 sm:mt-0 sm:ml-4 text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center justify-center">Service</h3>
                            <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                            <div class="mt-2">
                                <input type="hidden" x-model="data.id" >
                                <div class="my-2 grid grid-cols-1 gap-1">
                                    <div>(Multiple images can be selected.)</div>
                                    <div>
                                        <input type="file" id="images" multiple accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="text-red-500" x-text="data_error.images"></div>
                                    <div class="mt-2 flex items-center flex-warp" id="preview_images">
                                        <template x-for="(value, key) in array_images" :key="key">
                                            <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                <div class="border border-gray-300 rounded-lg p-2 mb-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title VietNam</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title English</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_en"></div>
                                        </div>
                                        <div>
                                            <div>Title Japan</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title sub VietNam</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_sub_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_sub_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title sub English</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_sub_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_sub_en"></div>
                                        </div>
                                        <div>
                                            <div>Title sub Japan</div>
                                            <div>
                                                <textarea type="text" x-model="data.title_sub_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title_sub_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment VietNam</div>
                                            <div>
                                                <textarea type="text" x-model="data.comment_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment English</div>
                                            <div>
                                                <textarea type="text" x-model="data.comment_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> </textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment Japan</div>
                                            <div>
                                                <textarea type="text" x-model="data.comment_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment_jp"></div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <button x-on:click="addService" class="w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">ADD</button>
                                </div>

                                <div class="mt-2">
                                    <template x-for="(value, index) in array_service" :key="index">
                                        <div class="border border-gray-300 rounded-lg p-2 mt-2">
                                            <button x-on:click="removeService(index)" class="w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">REMOVE</button>
                                            <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                                <div>
                                                    <div>Title service VietNam</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.title_service_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <template x-if="data_error[`title_service_vn.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title_service_vn.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title service English</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.title_service_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <template x-if="data_error[`title_service_en.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title_service_en.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title service Japan</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.title_service_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <template x-if="data_error[`title_service_jp.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title_service_jp.${index}`]"></div>
                                                    </template>
                                                </div>
                                            </div>
                                            <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                                <div>
                                                    <div>Comment service VietNam</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.comment_service_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <template x-if="data_error[`comment_service_vn.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`comment_service_vn.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Comment service English</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.comment_service_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <template x-if="data_error[`comment_service_en.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`comment_service_en.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Comment service Japan</div>
                                                    <div>
                                                        <textarea type="text" x-model="value.comment_service_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                    </div>
                                                    <div class="text-red-500" x-text="data_error.comment_service_jp"></div>
                                                    <div class="text-red-500" x-text="data_error[`comment_service_jp.${index}`]"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-center">
                    <button type="button" :disabled="isSubmitting" x-on:click="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            var check_preview_images = document.getElementById('images');
            if(check_preview_images) {
                document.getElementById('images').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_images');
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
