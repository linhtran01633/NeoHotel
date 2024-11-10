@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {!! htmlspecialchars(json_encode($aboutUs ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        array_title1_images : {!! htmlspecialchars(json_encode($array_title1_images ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        array_title3_images : {!! htmlspecialchars(json_encode($array_title3_images ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        array_title4_images : {!! htmlspecialchars(json_encode($array_title4_images ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        data_error: {},
        isSave : false,
        message_save: "",
        submitForm: function() {
            let url_post = "{{ route("admin.about_us.save") }}";
            let form_data = new FormData();

            for (let key in this.data) {
                if (this.data.hasOwnProperty(key)) {
                    form_data.append(key, this.data[key]);
                }
            }

            let title1_images = document.querySelector("#title1_images").files[0];
            if (title1_images) {
                form_data.append("title1_images", title1_images);
            }

            let title3_images = document.querySelector("#title3_images").files[0];
            if (title3_images) {
                form_data.append("title3_images", title3_images);
            }

            let title4_images = document.querySelector("#title4_images").files[0];
            if (title4_images) {
                form_data.append("title4_images", title4_images);
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
            }).catch((error) => {
                console.error("Error:", error)
            });
        },
    }'>

        <div class="inline-block align-bottom bg-white rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle w-full">
            <div class="w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    <div class="w-full">
                        <div class="mt-3 sm:mt-0 sm:ml-4 text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900 flex items-center justify-center">About us</h3>
                            <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                            <div class="mt-2">
                                <input type="hidden" x-model="data.id" >
                                <div class="my-2 grid grid-cols-1 gap-1">
                                    <div>(Only 1 image can be selected)</div>
                                    <div>
                                        <input type="file" id="title1_images" accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                    <div class="text-red-500" x-text="data_error.title1_images"></div>
                                    <div class="mt-2 flex items-center flex-warp" id="preview_title1_images">
                                        <template x-for="(value, key) in array_title1_images" :key="key">
                                            <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                            </div>
                                        </template>
                                    </div>
                                </div>
                                {{-- title 1 --}}
                                <div class="border border-gray-300 rounded-lg p-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 sub1 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub1 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub1 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 sub2 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub2 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub2 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 sub3 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub3 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub3 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 sub4 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub4 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub4 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title1 sub5 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub5 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_en"></div>
                                        </div>
                                        <div>
                                            <div>Title1 sub5 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_jp"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end title 1 --}}

                                {{-- title 2 --}}
                                <div class="border border-gray-300 rounded-lg p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title2 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title2 English</div>
                                            <div>
                                                <input type="text" x-model="data.title2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_en"></div>
                                        </div>
                                        <div>
                                            <div>Title2 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title2 sub1 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub1 English</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub1 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub1_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title2 sub2 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub2_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub2 English</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub2_en"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub2 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub2_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title2 sub3 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub3_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub3 English</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub3_en"></div>
                                        </div>
                                        <div>
                                            <div>Title2 sub3 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title2_sub3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title2_sub3_jp"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end title 2 --}}

                                {{-- Title 3 --}}
                                <div class="border border-gray-300 rounded-lg p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 gap-1">
                                        <div>(Only 1 image can be selected)</div>
                                        <div>
                                            <input type="file" id="title3_images" accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title3_images"></div>
                                        <div class="mt-2 flex items-center flex-warp" id="preview_title3_images">
                                            <template x-for="(value, key) in array_title3_images" :key="key">
                                                <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                    <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title3 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title3 English</div>
                                            <div>
                                                <input type="text" x-model="data.title3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_en"></div>
                                        </div>
                                        <div>
                                            <div>Title3 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title3 sub1 VietNam</div>
                                            <div>
                                                <textarea type="text" x-model="data.title3_sub1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_sub1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title3 sub1 English</div>
                                            <div>
                                                <textarea type="text" x-model="data.title3_sub1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_sub1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title3 sub1 Japan</div>
                                            <div>
                                                <textarea type="text" x-model="data.title3_sub1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title3_sub1_jp"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end title 3 --}}


                                {{-- Title 4 --}}
                                <div class="border border-gray-300 rounded-lg p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 gap-1">
                                        <div>(Only 1 image can be selected)</div>
                                        <div>
                                            <input type="file" id="title4_images" accept=".png, .jpg, .jpeg, .webp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title4_images"></div>
                                        <div class="mt-2 flex items-center flex-warp" id="preview_title4_images">
                                            <template x-for="(value, key) in array_title4_images" :key="key">
                                                <div class="w-20 h-20 border border-gray-300 rounded-lg mx-2 shadow">
                                                    <img class="w-full h-full rounded-lg show_enlarge" :data-src="`/storage/${value}`" :src="`/storage/${value}`" alt="Preview">
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title4 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title4_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title4 English</div>
                                            <div>
                                                <input type="text" x-model="data.title4_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_en"></div>
                                        </div>
                                        <div>
                                            <div>Title4 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title4_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_jp"></div>
                                        </div>
                                    </div>
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title4 sub1 VietNam</div>
                                            <div>
                                                <textarea type="text" x-model="data.title4_sub1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_sub1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title4 sub1 English</div>
                                            <div>
                                                <textarea type="text" x-model="data.title4_sub1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"> </textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_sub1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title4 sub1 Japan</div>
                                            <div>
                                                <textarea type="text" x-model="data.title4_sub1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"></textarea>
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title4_sub1_jp"></div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end title 4 --}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-50 px-4 py-3 flex justify-center">
                    <button type="button" x-on:click.debounce.5000ms="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {

            var check_preview_title1_images = document.getElementById('title1_images');
            if(check_preview_title1_images) {
                document.getElementById('title1_images').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_title1_images');
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

            var check_preview_title3_images = document.getElementById('title3_images');
            if(check_preview_title3_images) {
                document.getElementById('title3_images').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_title3_images');
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

            var check_preview_title4_images = document.getElementById('title4_images');
            if(check_preview_title4_images) {
                document.getElementById('title4_images').addEventListener('change', function(event) {
                    let files = event.target.files;
                    let preview = document.getElementById('preview_title4_images');
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
