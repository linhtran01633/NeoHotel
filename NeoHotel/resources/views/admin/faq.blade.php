@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {},
        data_error: {},
        isSave : false,
        message_save: "",
        isSubmitting: false,
        submitForm: function() {
            this.isSubmitting = true;
            let url_post = "{{ route("admin.faq.save") }}";

            fetch(url_post, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json, text-plain, */*",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.head.querySelector("meta[name=csrf-token]").content
                },
                body: JSON.stringify(this.data),
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
            this.data_error = {};
            this.message_save = "";
            this.isSave = !this.isSave;
        },
        editRow: function(id) {
            console.log(id);
            this.data_error = {};
            this.message_save = "";

            let url_post = "{{ route("admin.infomation_faq") }}";

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
                window.scrollTo({
                    top: 0,
                    behavior: "smooth" // Cuộn mượt mà
                });
            }).catch((error) => {
                console.error("Error:", error)
            });
        },
        editDelete: function(id) {
            let url_post = "{{ route("admin.delete.faq") }}";

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
            Create faq
        </button>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Table faq</h1>
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
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">faq</h3>
                                    <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                                    <div class="mt-2">
                                        <input type="hidden" x-model="data.id" >
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>Question VietNam</div>
                                                <div>
                                                    <textarea type="text" x-model="data.question_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.question_vn"></div>
                                            </div>
                                            <div>
                                                <div>Question English</div>
                                                <div>
                                                    <textarea type="text" x-model="data.question_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.question_en"></div>
                                            </div>
                                            <div>
                                                <div>Question Japan</div>
                                                <div>
                                                    <textarea type="text" x-model="data.question_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.question_jp"></div>
                                            </div>
                                        </div>
                                        <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                            <div>
                                                <div>Answer VietNam</div>
                                                <div>
                                                    <textarea type="text" x-model="data.answer_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.answer_vn"></div>
                                            </div>
                                            <div>
                                                <div>Answer English</div>
                                                <div>
                                                    <textarea type="text" x-model="data.answer_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.answer_en"></div>
                                            </div>
                                            <div>
                                                <div>Answer Japan</div>
                                                <div>
                                                    <textarea type="text" x-model="data.answer_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                                </div>
                                                <div class="text-red-500" x-text="data_error.answer_jp"></div>
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
            var CallDataTableURL = '{!! route('admin.faq') !!}';
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
                                <div>${row.question_vn}</div>
                                <div>${row.question_en}</div>
                                <div>${row.question_jp}</div>
                            `;

                            return html;
                        }
                    },

                    {
                        data: null,
                        defaultContent: "",
                        render : function ( data, type, row ) {
                            let html =  `
                                <div>${row.answer_vn}</div>
                                <div>${row.answer_en}</div>
                                <div>${row.answer_jp}</div>
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
        });
    </script>
@endsection
