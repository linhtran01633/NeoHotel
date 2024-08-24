@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {},
        data_error: {},
        isSave : false,
        message_save: "",
        submitForm: function() {
            let url_post = "{{ route("admin.category_room.save") }}";

            let form_data = new FormData();

            for (let key in this.data) {
                if (this.data.hasOwnProperty(key)) {
                    console.log(key);
                    form_data.append(key, this.data[key]);
                }
            }

            let imageFile = document.querySelector(&apos;input[type="file"]&apos;).files[0];
            if (imageFile) {
                form_data.append("images", imageFile);
            }

            let imageFiles = document.querySelector(&apos;input[type="file"]&apos;).files;
            if (imageFiles.length > 0) {
                for (let i = 0; i < imageFiles.length; i++) {
                    form_data.append("images[]", imageFiles[i]);
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
                    this.reloadTable();
                } else {
                    this.data_error = Object.fromEntries(
                        Object.entries(data.errors).map(([key, value]) => [key, value[0]])
                    );
                }

            }).catch((error) => {
                console.error("Error:", error)
            });
        },
        reloadTable: function() {
            $("#data_table").DataTable().ajax.reload();
        },

        editRow: function(id) {
            console.log(id);
            this.data_errror = {};

            let url_post = "{{ route("admin.infomation_category") }}";

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
            }).catch((error) => {
                console.error("Error:", error)
            });
        }
    }'>
        <button type="button" x-on:click="isSave = !isSave" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Category
        </button>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Table Category</h1>
            <div class="">
                <table id="data_table" class="w-full border border-gray-300 table-auto" style="min-width: 1500px !important">
                    <thead>
                        <tr class="bg-sidebar text-white">
                            <th class="w-24 py-2 px-4 border-b" style="min-width: 40px">ID</th>
                            <th class="w-52 py-2 px-4 border-b" style="min-width: 250px">Name</th>
                            <th class="w-48 py-2 px-4 border-b" style="min-width: 220px">Price</th>
                            <th class="w-72 py-2 px-4 border-b" style="min-width: 900px">Detail</th>
                            <th class="w-60 py-2 px-4 border-b" style="min-width: 250px">Acreage</th>
                            <th class="w-56 py-2 px-4 border-b" style="min-width: 420px">Bed</th>
                            <th class="w-52 py-2 px-4 border-b" style="min-width: 250px">Area</th>
                            <th class="w-24 py-2 px-4 border-b" style="min-width: 100px">Option</th>
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
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Category</h3>
                                    <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                                    <div class="mt-2">
                                        <input type="hidden" x-model="data.id" >
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>name VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.name_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_vn"></div>
                                            </div>
                                            <div>
                                                <div>name English</div>
                                                <div>
                                                    <input type="text" x-model="data.name_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_en"></div>
                                            </div>
                                            <div>
                                                <div>name Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.name_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.name_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>price VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.price_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.price_vn"></div>
                                            </div>
                                            <div>
                                                <div>price English</div>
                                                <div>
                                                    <input type="text" x-model="data.price_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.price_en"></div>
                                            </div>
                                            <div>
                                                <div>price Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.price_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.price_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>detail VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.detail_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.detail_vn"></div>
                                            </div>
                                            <div>
                                                <div>detail English</div>
                                                <div>
                                                    <input type="text" x-model="data.detail_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.detail_en"></div>
                                            </div>
                                            <div>
                                                <div>detail Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.detail_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.detail_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>acreage VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.acreage_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.acreage_vn"></div>
                                            </div>
                                            <div>
                                                <div>acreage English</div>
                                                <div>
                                                    <input type="text" x-model="data.acreage_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.acreage_en"></div>
                                            </div>
                                            <div>
                                                <div>acreage Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.acreage_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.acreage_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>bed VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.bed_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.bed_vn"></div>
                                            </div>
                                            <div>
                                                <div>bed English</div>
                                                <div>
                                                    <input type="text" x-model="data.bed_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.bed_en"></div>
                                            </div>
                                            <div>
                                                <div>bed Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.bed_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.bed_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>area VietNam</div>
                                                <div>
                                                    <input type="text" x-model="data.area_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.area_vn"></div>
                                            </div>
                                            <div>
                                                <div>area English</div>
                                                <div>
                                                    <input type="text" x-model="data.area_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.area_en"></div>
                                            </div>
                                            <div>
                                                <div>area Japan</div>
                                                <div>
                                                    <input type="text" x-model="data.area_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                </div>
                                                <div class="text-red-500" x-text="data_error.area_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 gap-4">
                                            <div>
                                                <input type="file" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" x-on:click="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
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
            var CallDataTableURL = '{!! route('admin.category_room') !!}';
            var table = $('#data_table').DataTable({
                paging: true,
                pagingType: 'simple',
                pageLength: 10,
                scrollX: true,
                processing: true,
                serverSide: true,
                searching: false,
                autoWidth: false,
                ajax: {
                    url: CallDataTableURL, // Đường dẫn đến API hoặc tệp tin JSON cung cấp dữ liệu
                        data: function(d){
                    },
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
                                <div>${row.price_vn}</div>
                                <div>${row.price_en}</div>
                                <div>${row.price_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.detail_vn}</div>
                                <div>${row.detail_en}</div>
                                <div>${row.detail_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.acreage_vn}</div>
                                <div>${row.acreage_en}</div>
                                <div>${row.acreage_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.bed_vn}</div>
                                <div>${row.bed_en}</div>
                                <div>${row.bed_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.area_vn}</div>
                                <div>${row.area_en}</div>
                                <div>${row.area_jp}</div>
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
                                `;

                            return html;
                        }
                    }
                ],
            });
        });
    </script>
@endsection
