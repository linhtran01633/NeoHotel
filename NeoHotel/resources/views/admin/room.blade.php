@extends('admin.layout_admin')
@section('content')
    <div x-data='{
        data: {!! htmlspecialchars(json_encode($data ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        equipmentForRent : {!! htmlspecialchars(json_encode($equipmentForRent ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        availableEquipment : {!! htmlspecialchars(json_encode($availableEquipment ?? new stdClass), ENT_QUOTES, 'UTF-8') !!},
        data_error: {},
        isSave : false,
        message_save: "",
        submitForm: function() {
            let url_post = "{{ route("admin.room.save") }}";

            this.data.equipment_for_rent = this.equipmentForRent;
            this.data.available_equipment = this.availableEquipment;

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
        addType2: function() {
            this.equipmentForRent.push({
                "title2_sub_vn": "",
                "title2_sub_en": "",
                "title2_sub_jp": "",
            });
        },
        removeType2: function(index) {
            if (index > -1) {
                this.equipmentForRent.splice(index, 1);
            }
        },
        addType3: function() {
            this.availableEquipment.push({
                "title3_sub_vn": "",
                "title3_sub_en": "",
                "title3_sub_jp": "",
            });
        },
        removeType3: function(index) {
            if (index > -1) {
                this.availableEquipment.splice(index, 1);
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

                                <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div>
                                        <div>Title 1 VietNam</div>
                                        <div>
                                            <input type="text" x-model="data.title1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title1_vn"></div>
                                    </div>
                                    <div>
                                        <div>Title 1 English</div>
                                        <div>
                                            <input type="text" x-model="data.title1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title1_en"></div>
                                    </div>
                                    <div>
                                        <div>Title 1 Japan</div>
                                        <div>
                                            <input type="text" x-model="data.title1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title1_jp"></div>
                                    </div>
                                </div>

                                <div class="border border-black rounded p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title 1 sub 1 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 1 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_en"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 1 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub1_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment 1 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.comment1_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment1_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment 1 English</div>
                                            <div>
                                                <input type="text" x-model="data.comment1_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment1_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment 1 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.comment1_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment1_jp"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-black rounded p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title 1 sub 2 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 2 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_en"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 2 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub2_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment 2 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.comment2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment2_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment 2 English</div>
                                            <div>
                                                <input type="text" x-model="data.comment2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment2_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment 2 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.comment2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment2_jp"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-black rounded p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title 1 sub 3 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 3 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_en"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 3 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub3_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment 3 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.comment3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment3_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment 3 English</div>
                                            <div>
                                                <input type="text" x-model="data.comment3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment3_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment 3 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.comment3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment3_jp"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-black rounded p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title 1 sub 4 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 4 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_en"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 4 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub4_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub4_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment 4 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.comment4_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment4_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment 4 English</div>
                                            <div>
                                                <input type="text" x-model="data.comment4_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment4_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment 4 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.comment4_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment4_jp"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="border border-black rounded p-2 mt-2">
                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Title 1 sub 5 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_vn"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 5 English</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_en"></div>
                                        </div>
                                        <div>
                                            <div>Title 1 sub 5 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.title1_sub5_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.title1_sub5_jp"></div>
                                        </div>
                                    </div>

                                    <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                        <div>
                                            <div>Comment 5 VietNam</div>
                                            <div>
                                                <input type="text" x-model="data.comment5_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment5_vn"></div>
                                        </div>
                                        <div>
                                            <div>Comment 5 English</div>
                                            <div>
                                                <input type="text" x-model="data.comment5_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment5_en"></div>
                                        </div>
                                        <div>
                                            <div>Comment 5 Japan</div>
                                            <div>
                                                <input type="text" x-model="data.comment5_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            </div>
                                            <div class="text-red-500" x-text="data_error.comment5_jp"></div>
                                        </div>
                                    </div>
                                </div>

                                <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div>
                                        <div>Title 2 VietNam</div>
                                        <div>
                                            <input type="text" x-model="data.title2_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title2_vn"></div>
                                    </div>
                                    <div>
                                        <div>Title 2 English</div>
                                        <div>
                                            <input type="text" x-model="data.title2_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title2_en"></div>
                                    </div>
                                    <div>
                                        <div>Title 2 Japan</div>
                                        <div>
                                            <input type="text" x-model="data.title2_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title2_jp"></div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button x-on:click="addType2" class="w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">ADD TITLE 2</button>
                                </div>

                                <div class="mt-2">
                                    <template x-for="(value, index) in equipmentForRent" :key="index">
                                        <div class="border border-black rounded p-2 mt-2">
                                            <button x-on:click="removeType2(index)" class="w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">REMOVE</button>
                                            <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                                <div>
                                                    <div>Title 2 sub VietNam</div>
                                                    <div>
                                                        <input type="text" x-model="value.title2_sub_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title2_sub_vn.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title2_sub_vn.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title 2 sub English</div>
                                                    <div>
                                                        <input type="text" x-model="value.title2_sub_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title2_sub_en.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title2_sub_en.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title 2 sub Japan</div>
                                                    <div>
                                                        <input type="text" x-model="value.title2_sub_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title2_sub_jp.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title2_sub_jp.${index}`]"></div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                    </template>
                                </div>


                                <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                                    <div>
                                        <div>Title 3 VietNam</div>
                                        <div>
                                            <input type="text" x-model="data.title3_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title3_vn"></div>
                                    </div>
                                    <div>
                                        <div>Title 3 English</div>
                                        <div>
                                            <input type="text" x-model="data.title3_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title3_en"></div>
                                    </div>
                                    <div>
                                        <div>Title 3 Japan</div>
                                        <div>
                                            <input type="text" x-model="data.title3_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                        </div>
                                        <div class="text-red-500" x-text="data_error.title3_jp"></div>
                                    </div>
                                </div>
                                <div class="mt-2">
                                    <button x-on:click="addType3" class="w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-blue-700 text-base font-medium text-white hover:bg-blue-50 hover:text-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">ADD TITLE 3</button>
                                </div>
                                <div class="mt-2">
                                    <template x-for="(value, index) in availableEquipment" :key="index">
                                        <div class="border border-black rounded p-2 mt-2">
                                            <button x-on:click="removeType3(index)" class="w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-red-700 text-base font-medium text-white hover:bg-red-50 hover:text-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">REMOVE</button>
                                            <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                                                <div>
                                                    <div>Icon</div>
                                                    <div>
                                                        {{-- <select x-model="value.icon" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option class="option1" value="">Option 1</option>
                                                            <option value="0">
                                                                </option>
                                                            <option value="1"></option>
                                                            <option value="2"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.3627 14.6735L22.3753 9.46772C22.269 9.00905 22.0571 8.58152 21.7565 8.21916L22.3361 7.63791C22.3976 7.57641 22.4321 7.49302 22.4321 7.40606C22.4321 7.31911 22.3976 7.23572 22.3361 7.17422L22.2236 7.06172C22.414 6.92208 22.5739 6.74501 22.6935 6.54137C22.813 6.33773 22.8897 6.11181 22.9188 5.87747C22.926 5.60791 22.8773 5.33978 22.7758 5.08997C22.7053 4.91276 22.6634 4.72549 22.6517 4.53516C22.6517 4.44813 22.6171 4.36467 22.5555 4.30314C22.494 4.2416 22.4106 4.20703 22.3235 4.20703C22.2365 4.20703 22.153 4.2416 22.0915 4.30314C22.03 4.36467 21.9954 4.44813 21.9954 4.53516C22.0056 4.79605 22.0589 5.05346 22.1531 5.29697C22.2235 5.46479 22.2613 5.6445 22.2645 5.82647C22.2369 5.98232 22.1777 6.13089 22.0907 6.26308C22.0036 6.39527 21.8905 6.50829 21.7582 6.59522L21.5409 6.37791C21.4782 6.31862 21.3952 6.28558 21.309 6.28558C21.2227 6.28558 21.1397 6.31862 21.077 6.37791L20.2005 7.25653C19.9985 7.20989 19.7919 7.18599 19.5845 7.18528H12.9883C7.33872 7.18528 3.18597 11.9367 1.92578 16.7133H1.55078C1.46376 16.7133 1.3803 16.7478 1.31876 16.8094C1.25723 16.8709 1.22266 16.9544 1.22266 17.0414V18.371C1.22266 18.458 1.25723 18.5415 1.31876 18.603C1.3803 18.6645 1.46376 18.6991 1.55078 18.6991H21.5233C21.6103 18.699 21.6937 18.6645 21.7552 18.6029C21.8168 18.5414 21.8514 18.458 21.8514 18.371V17.111C21.8563 17.0884 21.8588 17.0653 21.8589 17.0422C21.8589 15.9483 22.2542 15.3329 23.1408 15.047C23.217 15.0224 23.2815 14.9709 23.3224 14.9021C23.3632 14.8334 23.3775 14.7521 23.3627 14.6735ZM21.3095 7.07559L21.6407 7.40672L21.2844 7.76447C21.1569 7.66713 21.0215 7.58076 20.8794 7.50628L21.3095 7.07559ZM1.87891 18.0428V17.3695H21.1952V18.0421L1.87891 18.0428ZM21.2141 16.7133H2.60341C3.84972 12.2388 7.73716 7.84153 12.9883 7.84153H19.5845C20.1347 7.84316 20.6635 8.05506 21.0626 8.43384C21.0654 8.43684 21.0673 8.44022 21.0703 8.44322C21.0776 8.45053 21.086 8.45597 21.0939 8.46197C21.4117 8.77328 21.6337 9.16916 21.7335 9.60272L22.6663 14.5233C21.7695 14.905 21.2919 15.6252 21.2141 16.7133Z" fill="#633511"></path><path d="M15.2532 15.0261H9.64062C9.5536 15.0261 9.47014 15.0607 9.40861 15.1222C9.34707 15.1838 9.3125 15.2672 9.3125 15.3543C9.3125 15.4413 9.34707 15.5247 9.40861 15.5863C9.47014 15.6478 9.5536 15.6824 9.64062 15.6824H15.2532C15.3403 15.6824 15.4237 15.6478 15.4853 15.5863C15.5468 15.5247 15.5814 15.4413 15.5814 15.3543C15.5814 15.2672 15.5468 15.1838 15.4853 15.1222C15.4237 15.0607 15.3403 15.0261 15.2532 15.0261ZM20.5211 9.87402C20.4979 9.74592 20.4321 9.62941 20.3344 9.54343C20.2367 9.45744 20.1128 9.40703 19.9827 9.40039H14.2177C11.972 9.40039 10.0064 10.9191 9.32656 13.1796C9.31182 13.2286 9.30875 13.2804 9.31757 13.3308C9.3264 13.3811 9.3469 13.4287 9.37741 13.4698C9.40793 13.5108 9.44763 13.5442 9.49333 13.5672C9.53903 13.5901 9.58948 13.6021 9.64062 13.6021H20.6656C20.7459 13.6014 20.8249 13.582 20.8965 13.5457C20.968 13.5093 21.0302 13.4569 21.0781 13.3925C21.1423 13.3101 21.187 13.2143 21.2088 13.1123C21.2306 13.0102 21.229 12.9045 21.2041 12.8031L20.5211 9.87402ZM15.0239 12.9458V12.0271H16.7137V12.9458H15.0239ZM17.3699 12.9458V11.6999C17.3699 11.6129 17.3354 11.5294 17.2738 11.4679C17.2123 11.4063 17.1288 11.3718 17.0418 11.3718H14.6958C14.6088 11.3718 14.5253 11.4063 14.4638 11.4679C14.4023 11.5294 14.3677 11.6129 14.3677 11.6999V12.9462H10.1026C10.802 11.2011 12.4064 10.057 14.2177 10.057H19.8896L20.5646 12.9462L17.3699 12.9458Z" fill="#633511"></path></svg></option>
                                                            <option value="3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.2211 12.1429C23.2492 12.0743 23.2564 11.999 23.2419 11.9263C23.2275 11.8536 23.1919 11.7868 23.1398 11.7342L22.0148 10.6092C21.944 10.5409 21.8493 10.5031 21.751 10.5039C21.6527 10.5048 21.5586 10.5442 21.4891 10.6137C21.4195 10.6833 21.3801 10.7773 21.3792 10.8756C21.3784 10.974 21.4162 11.0687 21.4845 11.1394L21.9697 11.6247H12.375C12.2755 11.6247 12.1802 11.6642 12.1098 11.7345C12.0395 11.8048 12 11.9002 12 11.9997C12 12.0991 12.0395 12.1945 12.1098 12.2648C12.1802 12.3352 12.2755 12.3747 12.375 12.3747H21.9697L21.4849 12.8595C21.4491 12.8941 21.4205 12.9355 21.4008 12.9813C21.3812 13.027 21.3708 13.0762 21.3704 13.126C21.37 13.1758 21.3795 13.2252 21.3983 13.2713C21.4172 13.3174 21.445 13.3592 21.4802 13.3944C21.5154 13.4297 21.5573 13.4575 21.6034 13.4764C21.6495 13.4952 21.6989 13.5047 21.7487 13.5043C21.7984 13.5038 21.8477 13.4935 21.8934 13.4738C21.9392 13.4542 21.9805 13.4256 22.0151 13.3898C22.0526 13.3373 23.2586 12.1872 23.2211 12.1429Z" fill="#633511"></path><path d="M21.345 14.4819C21.3866 14.4425 20.1735 13.2841 20.1394 13.235C20.0686 13.1667 19.9739 13.1289 19.8756 13.1298C19.7773 13.1306 19.6832 13.1701 19.6137 13.2396C19.5442 13.3091 19.5047 13.4032 19.5039 13.5015C19.503 13.5998 19.5408 13.6945 19.6091 13.7653L20.0936 14.2501H14.25C14.1505 14.2501 14.0552 14.2896 13.9848 14.36C13.9145 14.4303 13.875 14.5257 13.875 14.6251C13.875 14.7246 13.9145 14.82 13.9848 14.8903C14.0552 14.9606 14.1505 15.0001 14.25 15.0001H15.375V18.8589L8.625 21.2214V2.77851L15.375 5.14101V9.00014H14.25C14.1505 9.00014 14.0552 9.03965 13.9848 9.10997C13.9145 9.1803 13.875 9.27568 13.875 9.37514C13.875 9.4746 13.9145 9.56998 13.9848 9.6403C14.0552 9.71063 14.1505 9.75014 14.25 9.75014H20.0947L19.6099 10.235C19.5741 10.2696 19.5455 10.311 19.5258 10.3567C19.5062 10.4025 19.4958 10.4517 19.4954 10.5015C19.495 10.5513 19.5045 10.6007 19.5233 10.6467C19.5422 10.6928 19.57 10.7347 19.6052 10.7699C19.6404 10.8051 19.6823 10.833 19.7284 10.8518C19.7745 10.8707 19.8239 10.8802 19.8736 10.8797C19.9234 10.8793 19.9726 10.869 20.0184 10.8493C20.0642 10.8296 20.1055 10.8011 20.1401 10.7653L21.2651 9.64026C21.3347 9.56943 21.3738 9.47408 21.3738 9.37476C21.3738 9.27544 21.3347 9.1801 21.2651 9.10926L20.1401 7.98426C20.0694 7.91595 19.9747 7.87816 19.8763 7.87901C19.778 7.87987 19.684 7.9193 19.6144 7.98883C19.5449 8.05836 19.5055 8.15241 19.5046 8.25074C19.5038 8.34906 19.5416 8.44379 19.6099 8.51451L20.0947 9.00014H16.125V4.87514C16.125 4.79741 16.1009 4.72159 16.056 4.65817C16.011 4.59475 15.9475 4.54687 15.8741 4.52114L8.37412 1.89614C8.31758 1.8763 8.2571 1.87031 8.19776 1.87866C8.13841 1.88701 8.08194 1.90945 8.03306 1.94412C7.98418 1.97879 7.94432 2.02467 7.91682 2.07791C7.88932 2.13115 7.87498 2.19021 7.875 2.25014V12.3905C5.89312 12.2086 5.89462 15.1674 7.875 14.9848V15.9376C7.72582 15.9376 7.58274 15.9969 7.47725 16.1024C7.37176 16.2079 7.3125 16.351 7.3125 16.5001C7.3125 16.6493 7.37176 16.7924 7.47725 16.8979C7.58274 17.0034 7.72582 17.0626 7.875 17.0626V21.7501C7.87569 21.8494 7.91542 21.9444 7.98559 22.0145C8.05577 22.0847 8.15076 22.1245 8.25 22.1251C8.29225 22.125 8.33419 22.1179 8.37412 22.1041L15.8741 19.4791C15.9475 19.4534 16.011 19.4055 16.056 19.3421C16.1009 19.2787 16.125 19.2029 16.125 19.1251V15.0001H20.0936L19.6091 15.485C19.5408 15.5557 19.503 15.6505 19.5039 15.7488C19.5047 15.8471 19.5442 15.9412 19.6137 16.0107C19.6832 16.0802 19.7773 16.1197 19.8756 16.1205C19.9739 16.1214 20.0686 16.0836 20.1394 16.0153L21.2644 14.8903C21.3166 14.8378 21.3522 14.771 21.3666 14.6983C21.3809 14.6256 21.3734 14.5503 21.345 14.4819ZM7.6875 14.2501C7.6052 14.2508 7.52377 14.2333 7.44894 14.1991C7.37412 14.1648 7.30772 14.1146 7.25444 14.0518C7.20115 13.9891 7.16228 13.9155 7.14057 13.8361C7.11885 13.7567 7.11482 13.6735 7.12876 13.5924C7.1427 13.5113 7.17426 13.4342 7.22123 13.3666C7.26819 13.2991 7.32942 13.2426 7.40058 13.2013C7.47174 13.1599 7.55111 13.1347 7.63308 13.1274C7.71506 13.1201 7.79764 13.1308 7.875 13.1589V14.2164C7.81485 14.2381 7.75145 14.2495 7.6875 14.2501ZM3.1875 9.00014C3.5356 9.00014 3.86944 8.86186 4.11558 8.61572C4.36172 8.36958 4.5 8.03574 4.5 7.68764C4.5 7.33954 4.36172 7.0057 4.11558 6.75956C3.86944 6.51342 3.5356 6.37514 3.1875 6.37514C2.8394 6.37514 2.50556 6.51342 2.25942 6.75956C2.01328 7.0057 1.875 7.33954 1.875 7.68764C1.875 8.03574 2.01328 8.36958 2.25942 8.61572C2.50556 8.86186 2.8394 9.00014 3.1875 9.00014ZM3.1875 7.12514C3.33668 7.12514 3.47976 7.1844 3.58525 7.28989C3.69074 7.39538 3.75 7.53845 3.75 7.68764C3.75 7.83682 3.69074 7.9799 3.58525 8.08539C3.47976 8.19088 3.33668 8.25014 3.1875 8.25014C3.03832 8.25014 2.89524 8.19088 2.78975 8.08539C2.68426 7.9799 2.625 7.83682 2.625 7.68764C2.625 7.53845 2.68426 7.39538 2.78975 7.28989C2.89524 7.1844 3.03832 7.12514 3.1875 7.12514ZM5.25 13.3126C5.25 12.8651 5.07221 12.4359 4.75574 12.1194C4.43927 11.8029 4.01005 11.6251 3.5625 11.6251C3.11495 11.6251 2.68572 11.8029 2.36926 12.1194C2.05279 12.4359 1.875 12.8651 1.875 13.3126C1.875 13.7602 2.05279 14.1894 2.36926 14.5059C2.68572 14.8223 3.11495 15.0001 3.5625 15.0001C4.01005 15.0001 4.43927 14.8223 4.75574 14.5059C5.07221 14.1894 5.25 13.7602 5.25 13.3126ZM3.5625 14.2501C3.31386 14.2501 3.0754 14.1514 2.89959 13.9756C2.72377 13.7997 2.625 13.5613 2.625 13.3126C2.625 13.064 2.72377 12.8255 2.89959 12.6497C3.0754 12.4739 3.31386 12.3751 3.5625 12.3751C3.81114 12.3751 4.0496 12.4739 4.22541 12.6497C4.40123 12.8255 4.5 13.064 4.5 13.3126C4.5 13.5613 4.40123 13.7997 4.22541 13.9756C4.0496 14.1514 3.81114 14.2501 3.5625 14.2501Z" fill="#633511"></path><path d="M7.125 10.3125C7.125 10.0639 7.02623 9.8254 6.85041 9.64959C6.6746 9.47377 6.43614 9.375 6.1875 9.375C5.93886 9.375 5.7004 9.47377 5.52459 9.64959C5.34877 9.8254 5.25 10.0639 5.25 10.3125C5.25 10.5611 5.34877 10.7996 5.52459 10.9754C5.7004 11.1512 5.93886 11.25 6.1875 11.25C6.43614 11.25 6.6746 11.1512 6.85041 10.9754C7.02623 10.7996 7.125 10.5611 7.125 10.3125ZM6.1875 10.5C6.13777 10.5 6.09008 10.4802 6.05492 10.4451C6.01975 10.4099 6 10.3622 6 10.3125C6 10.2628 6.01975 10.2151 6.05492 10.1799C6.09008 10.1448 6.13777 10.125 6.1875 10.125C6.23723 10.125 6.28492 10.1448 6.32008 10.1799C6.35525 10.2151 6.375 10.2628 6.375 10.3125C6.375 10.3622 6.35525 10.4099 6.32008 10.4451C6.28492 10.4802 6.23723 10.5 6.1875 10.5ZM6.5625 8.25C6.71168 8.25 6.85476 8.19074 6.96025 8.08525C7.06574 7.97976 7.125 7.83668 7.125 7.6875C7.125 7.53832 7.06574 7.39524 6.96025 7.28975C6.85476 7.18426 6.71168 7.125 6.5625 7.125C6.41332 7.125 6.27024 7.18426 6.16475 7.28975C6.05926 7.39524 6 7.53832 6 7.6875C6 7.83668 6.05926 7.97976 6.16475 8.08525C6.27024 8.19074 6.41332 8.25 6.5625 8.25ZM1.3125 10.125C1.16332 10.125 1.02024 10.1843 0.914752 10.2898C0.809263 10.3952 0.75 10.5383 0.75 10.6875C0.75 10.8367 0.809263 10.9798 0.914752 11.0852C1.02024 11.1907 1.16332 11.25 1.3125 11.25C1.46168 11.25 1.60476 11.1907 1.71025 11.0852C1.81574 10.9798 1.875 10.8367 1.875 10.6875C1.875 10.5383 1.81574 10.3952 1.71025 10.2898C1.60476 10.1843 1.46168 10.125 1.3125 10.125ZM4.875 15.75C4.57663 15.75 4.29048 15.8685 4.0795 16.0795C3.86853 16.2905 3.75 16.5766 3.75 16.875C3.75 17.1734 3.86853 17.4595 4.0795 17.6705C4.29048 17.8815 4.57663 18 4.875 18C5.17337 18 5.45952 17.8815 5.6705 17.6705C5.88147 17.4595 6 17.1734 6 16.875C6 16.5766 5.88147 16.2905 5.6705 16.0795C5.45952 15.8685 5.17337 15.75 4.875 15.75ZM4.875 17.25C4.77554 17.25 4.68016 17.2105 4.60984 17.1402C4.53951 17.0698 4.5 16.9745 4.5 16.875C4.5 16.7755 4.53951 16.6802 4.60984 16.6098C4.68016 16.5395 4.77554 16.5 4.875 16.5C4.97446 16.5 5.06984 16.5395 5.14016 16.6098C5.21049 16.6802 5.25 16.7755 5.25 16.875C5.25 16.9745 5.21049 17.0698 5.14016 17.1402C5.06984 17.2105 4.97446 17.25 4.875 17.25Z" fill="#633511"></path></svg></option>
                                                            <option value="4"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.793 5.625C22.792 4.7302 22.4361 3.87234 21.8034 3.23962C21.1707 2.60691 20.3128 2.251 19.418 2.25H15.5829C14.8132 1.35684 13.1485 0.75 11.168 0.75C8.53863 0.75 6.46291 1.81795 6.30808 3.20916C5.9237 3.60066 5.58658 4.17309 5.29281 4.875H2.91803C2.85675 4.87499 2.79641 4.89 2.74227 4.91871C2.68813 4.94742 2.64186 4.98896 2.60749 5.03969C2.57313 5.09043 2.55172 5.14881 2.54514 5.20974C2.53856 5.27066 2.54701 5.33227 2.56975 5.38917L4.06975 9.13917C4.08438 9.17553 4.10463 9.20936 4.12975 9.23944C3.44598 13.1179 3.30241 17.3213 3.29303 17.6133C3.29303 17.6153 3.29406 17.6171 3.29402 17.6191C3.29397 17.6212 3.29303 17.6229 3.29303 17.625C3.29339 18.0618 3.40279 18.4916 3.61131 18.8754C3.81983 19.2591 4.12087 19.5848 4.48713 19.8228C3.90683 20.0946 3.41587 20.5259 3.07161 21.0664C2.72735 21.6069 2.54402 22.2342 2.54303 22.875C2.54303 22.9745 2.58254 23.0698 2.65287 23.1402C2.72319 23.2105 2.81858 23.25 2.91803 23.25H19.418C19.5175 23.25 19.6129 23.2105 19.6832 23.1402C19.7535 23.0698 19.793 22.9745 19.793 22.875C19.792 22.2342 19.6087 21.6069 19.2645 21.0664C18.9202 20.5259 18.4292 20.0946 17.8489 19.8228C18.2152 19.5848 18.5162 19.2591 18.7248 18.8754C18.9333 18.4916 19.0427 18.0618 19.043 17.625C19.043 17.6229 19.0419 17.6212 19.0419 17.6191C19.0419 17.6171 19.0429 17.6153 19.0428 17.6133C19.0402 17.5299 19.0261 17.1223 18.9922 16.5H19.418C20.3128 16.499 21.1707 16.1431 21.8034 15.5104C22.4361 14.8777 22.792 14.0198 22.793 13.125V5.625ZM11.168 1.5C13.2591 1.5 14.8049 2.23097 15.1964 3H7.13969C7.53119 2.23097 9.07698 1.5 11.168 1.5ZM3.47191 5.625H5.01147C4.76067 6.37696 4.55292 7.14259 4.3892 7.91817L3.47191 5.625ZM19.0163 22.5H3.31975C3.41074 21.8756 3.72329 21.3047 4.20031 20.8916C4.67733 20.4785 5.28701 20.2508 5.91803 20.25H16.418C17.0491 20.2508 17.6587 20.4785 18.1358 20.8916C18.6128 21.3047 18.9253 21.8756 19.0163 22.5ZM16.418 19.5H5.91803C5.48599 19.4994 5.06735 19.3499 4.73268 19.0767C4.39801 18.8035 4.16777 18.4232 4.08077 18H18.2555C18.1685 18.4232 17.9382 18.8035 17.6035 19.0768C17.2688 19.35 16.8501 19.4995 16.418 19.5ZM4.05841 17.25C4.09923 16.3433 4.22889 13.9651 4.55627 11.4331C4.93595 8.49558 5.40756 6.6203 5.872 5.42062C5.88171 5.40128 5.88966 5.38111 5.89577 5.36034C6.2192 4.54045 6.53842 4.04227 6.81981 3.75H15.5163C16.2084 4.46887 17.1287 6.39844 17.7798 11.4331C18.1072 13.9651 18.2368 16.3433 18.2777 17.25H4.05841ZM17.5376 6.29245C17.5383 6.28308 17.543 6.27506 17.543 6.2655V5.625C17.5434 5.32673 17.662 5.04078 17.8729 4.82987C18.0838 4.61897 18.3698 4.50033 18.668 4.5H19.418C19.7163 4.50033 20.0023 4.61897 20.2132 4.82987C20.4241 5.04078 20.5427 5.32673 20.543 5.625V13.125C20.5427 13.4233 20.4241 13.7092 20.2132 13.9201C20.0023 14.131 19.7163 14.2497 19.418 14.25H18.8347C18.6336 11.8809 18.2505 8.71973 17.5376 6.29245ZM22.043 13.125C22.0422 13.8209 21.7654 14.4882 21.2733 14.9803C20.7812 15.4724 20.114 15.7492 19.418 15.75H18.9472C18.9319 15.5151 18.9149 15.2667 18.895 15H19.418C19.9151 14.9994 20.3917 14.8017 20.7432 14.4502C21.0947 14.0987 21.2924 13.6221 21.293 13.125V5.625C21.2924 5.1279 21.0947 4.65132 20.7432 4.29982C20.3917 3.94831 19.9151 3.75058 19.418 3.75H18.668C18.3223 3.75118 17.9836 3.84819 17.6897 4.03023C17.3957 4.21228 17.158 4.47224 17.0029 4.78125C16.7187 4.12195 16.3948 3.58289 16.0279 3.20906C16.0201 3.13858 16.0074 3.06872 15.9899 3H19.418C20.114 3.00081 20.7812 3.27763 21.2733 3.76974C21.7654 4.26184 22.0422 4.92905 22.043 5.625V13.125Z" fill="#633511"></path><path d="M12.293 21H10.043C9.94351 21 9.84813 21.0395 9.7778 21.1098C9.70748 21.1802 9.66797 21.2755 9.66797 21.375C9.66797 21.4745 9.70748 21.5698 9.7778 21.6402C9.84813 21.7105 9.94351 21.75 10.043 21.75H12.293C12.3924 21.75 12.4878 21.7105 12.5581 21.6402C12.6285 21.5698 12.668 21.4745 12.668 21.375C12.668 21.2755 12.6285 21.1802 12.5581 21.1098C12.4878 21.0395 12.3924 21 12.293 21Z" fill="#633511"></path></svg></option>
                                                            <option value="5"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M9.64422 6.74398H14.3541C14.325 7.05651 14.2552 7.38718 14.0776 7.57731C14.0042 7.65651 13.8026 7.68424 13.4957 7.68424H10.5042C10.197 7.68424 10.0026 7.64958 9.92076 7.57731C9.68742 7.37304 9.64422 7.09811 9.64422 6.74398ZM6.06342 5.21758H7.48582C7.82742 5.21758 8.04422 5.25918 8.18316 5.32318C8.32076 5.38691 8.39249 5.46344 8.47169 5.59838L9.05089 6.60371L9.21329 7.41358C9.26476 7.66904 9.40076 7.90958 9.63009 8.04958C9.86076 8.18984 10.1442 8.23704 10.504 8.23704H13.4957C13.8541 8.23704 14.1373 8.18984 14.3677 8.04958C14.5968 7.90958 14.7333 7.66904 14.7845 7.41358L14.9469 6.60371L15.5261 5.59838C15.6053 5.46344 15.6792 5.38718 15.8168 5.32318C15.9544 5.25918 16.1709 5.21758 16.5136 5.21758H17.9344C18.1386 5.21758 18.3693 5.31891 18.625 5.54958C18.8802 5.77998 19.1485 6.13304 19.4085 6.57758C19.9293 7.46638 20.421 8.71091 20.8277 10.0632C21.6402 12.7621 22.1178 15.9077 21.9877 17.505C21.9264 17.8661 21.4362 18.3984 20.8253 18.6394C20.2096 18.884 19.557 18.8741 19.1013 18.3632L16.1376 15.0221C16.1114 14.9929 16.0793 14.9695 16.0434 14.9537C16.0074 14.9379 15.9685 14.9299 15.9293 14.9304H8.07089C8.03162 14.9298 7.99268 14.9377 7.95674 14.9535C7.92079 14.9693 7.88869 14.9927 7.86262 15.0221L4.89676 18.3634C4.44262 18.8744 3.78849 18.8842 3.17489 18.6397C2.56236 18.3984 2.07169 17.8664 2.01089 17.5053C1.88022 15.908 2.35836 12.7621 3.17089 10.0634C3.57756 8.71118 4.06929 7.46664 4.59009 6.57784C4.85009 6.13331 5.11782 5.78024 5.37356 5.54984C5.62902 5.31891 5.85942 5.21758 6.06342 5.21758ZM6.06342 4.66211C5.67916 4.66211 5.32076 4.84958 5.00102 5.13864C4.68182 5.42584 4.39009 5.82211 4.11249 6.29811C3.55409 7.24958 3.05676 8.52478 2.64156 9.90371C1.80929 12.6634 1.30822 15.8077 1.45516 17.5648C1.45676 17.573 1.45676 17.5786 1.45836 17.5856C1.56662 18.2746 2.21249 18.8552 2.96929 19.1565C3.72769 19.4565 4.67756 19.4426 5.30929 18.7301L8.19409 15.4829H15.8042L18.6885 18.7301C19.3208 19.4426 20.2709 19.4568 21.029 19.1565C21.7858 18.8552 22.4317 18.2746 22.54 17.5856C22.5416 17.5788 22.5425 17.5718 22.5426 17.5648C22.6901 15.8077 22.1885 12.6634 21.3584 9.90371C20.9426 8.52451 20.4458 7.24958 19.8874 6.29811C19.6082 5.82211 19.3165 5.42584 18.9968 5.13864C18.6792 4.84958 18.3208 4.66211 17.9344 4.66211H16.5136C16.125 4.66211 15.8293 4.70958 15.5845 4.82184C15.3402 4.93304 15.1653 5.11624 15.0469 5.32184L14.5442 6.19011H9.45409L8.95249 5.32184C8.83436 5.11624 8.65916 4.93331 8.41489 4.82184C8.17062 4.70958 7.87489 4.66211 7.48582 4.66211H6.06342Z" fill="#633511"></path><path d="M6.97829 8.96266C7.23669 8.96266 7.43509 9.16159 7.43509 9.41999V10.2048C7.43505 10.2413 7.44222 10.2775 7.4562 10.3112C7.47017 10.3449 7.49066 10.3756 7.5165 10.4013C7.54234 10.4271 7.57302 10.4476 7.60678 10.4615C7.64054 10.4754 7.67671 10.4825 7.71322 10.4824H8.49749C8.75589 10.4824 8.95322 10.6808 8.95322 10.9392C8.95322 11.1963 8.75589 11.3933 8.49749 11.3933H7.71322C7.55909 11.3933 7.43509 11.5184 7.43509 11.6715V12.4576C7.43509 12.7141 7.23669 12.9131 6.97829 12.9131C6.71989 12.9131 6.52149 12.7141 6.52149 12.4576V11.6715C6.52149 11.5184 6.39749 11.3933 6.24335 11.3933H5.45909C5.20069 11.3933 5.00175 11.1963 5.00175 10.9392C5.00175 10.6808 5.20069 10.4824 5.45909 10.4824H6.24335C6.27986 10.4825 6.31603 10.4754 6.34979 10.4615C6.38355 10.4476 6.41423 10.4271 6.44007 10.4013C6.46591 10.3756 6.4864 10.3449 6.50038 10.3112C6.51435 10.2775 6.52152 10.2413 6.52149 10.2048V9.41999C6.52149 9.16159 6.71989 8.96266 6.97829 8.96266ZM6.97829 8.40879C6.7104 8.4097 6.45376 8.51654 6.26436 8.70599C6.07497 8.89543 5.9682 9.15211 5.96735 9.41999V9.92666H5.45909C4.90335 9.92666 4.44922 10.384 4.44922 10.9392C4.44992 11.2068 4.55655 11.4633 4.74578 11.6525C4.93501 11.8417 5.19147 11.9484 5.45909 11.9491H5.96735V12.4576C5.96735 13.0117 6.42255 13.4685 6.97829 13.4685C7.53402 13.4685 7.98815 13.0117 7.98815 12.4576V11.9491H8.49749C8.7651 11.9484 9.02156 11.8417 9.21079 11.6525C9.40003 11.4633 9.50665 11.2068 9.50735 10.9392C9.50735 10.3837 9.05322 9.92666 8.49749 9.92666H7.98815V9.41999C7.98759 9.15221 7.88106 8.89553 7.69183 8.70605C7.5026 8.51658 7.24607 8.4097 6.97829 8.40879ZM16.1476 8.84906C16.2339 8.84838 16.3194 8.86487 16.3993 8.89757C16.4791 8.93027 16.5517 8.97852 16.6127 9.03952C16.6737 9.10051 16.722 9.17304 16.7547 9.25287C16.7875 9.3327 16.804 9.41824 16.8034 9.50452C16.8039 9.59085 16.7874 9.67644 16.7546 9.75633C16.7219 9.83622 16.6736 9.90882 16.6126 9.96993C16.5516 10.031 16.4791 10.0794 16.3993 10.1123C16.3195 10.1452 16.234 10.162 16.1476 10.1616C16.0613 10.1619 15.9758 10.1451 15.8961 10.1122C15.8163 10.0793 15.7439 10.0308 15.6829 9.96974C15.622 9.90863 15.5738 9.83606 15.5411 9.7562C15.5084 9.67635 15.4919 9.59081 15.4924 9.50452C15.4918 9.41829 15.5083 9.33279 15.541 9.25299C15.5737 9.1732 15.6219 9.1007 15.6829 9.03971C15.7438 8.97872 15.8163 8.93046 15.8961 8.89773C15.9759 8.865 16.0614 8.84845 16.1476 8.84906ZM16.1476 8.29492C15.4826 8.29492 14.9367 8.83919 14.9367 9.50452C14.9367 10.1699 15.4826 10.7141 16.1476 10.7141C16.8132 10.7141 17.3591 10.1699 17.3591 9.50452C17.3591 8.83919 16.8132 8.29492 16.1476 8.29492ZM16.1476 11.7144C16.234 11.714 16.3197 11.7308 16.3996 11.7637C16.4795 11.7967 16.552 11.8452 16.613 11.9064C16.674 11.9676 16.7223 12.0404 16.7549 12.1204C16.7876 12.2004 16.8041 12.2861 16.8034 12.3725C16.8039 12.4588 16.7873 12.5443 16.7546 12.6241C16.7218 12.7039 16.6736 12.7765 16.6126 12.8375C16.5516 12.8985 16.479 12.9467 16.3992 12.9795C16.3194 13.0122 16.2339 13.0288 16.1476 13.0283C16.0614 13.0288 15.9759 13.0122 15.8961 12.9794C15.8164 12.9466 15.7439 12.8984 15.6829 12.8373C15.622 12.7763 15.5738 12.7038 15.5411 12.624C15.5083 12.5443 15.4918 12.4588 15.4924 12.3725C15.4917 12.2861 15.5081 12.2005 15.5407 12.1205C15.5734 12.0405 15.6215 11.9678 15.6825 11.9065C15.7434 11.8453 15.8159 11.7968 15.8958 11.7638C15.9756 11.7308 16.0612 11.714 16.1476 11.7144ZM16.1476 11.1616C15.4826 11.1616 14.9367 11.7072 14.9367 12.3725C14.9367 13.0379 15.4826 13.5827 16.1476 13.5827C16.8132 13.5827 17.3591 13.0379 17.3591 12.3725C17.3591 11.7072 16.8132 11.1616 16.1476 11.1616ZM18.5476 10.2808C18.6341 10.2804 18.7199 10.2972 18.7999 10.3301C18.8799 10.3631 18.9525 10.4116 19.0137 10.4728C19.0748 10.5341 19.1232 10.6068 19.156 10.6869C19.1888 10.7669 19.2055 10.8527 19.205 10.9392C19.2053 11.0255 19.1885 11.1111 19.1556 11.1909C19.1227 11.2707 19.0742 11.3432 19.0131 11.4041C18.952 11.4651 18.8793 11.5133 18.7994 11.546C18.7195 11.5787 18.634 11.5953 18.5476 11.5947C18.4614 11.5953 18.3759 11.5788 18.2961 11.5461C18.2163 11.5133 18.1438 11.4651 18.0828 11.4041C18.0218 11.3431 17.9736 11.2706 17.9409 11.1908C17.9082 11.1109 17.8917 11.0254 17.8924 10.9392C17.8915 10.8527 17.9079 10.767 17.9404 10.6869C17.973 10.6069 18.0212 10.5341 18.0822 10.4728C18.1431 10.4115 18.2157 10.363 18.2956 10.33C18.3755 10.2971 18.4612 10.2803 18.5476 10.2808ZM18.5476 9.72826C17.8826 9.72826 17.3367 10.2741 17.3367 10.9395C17.3367 11.6048 17.8826 12.1491 18.5476 12.1491C19.2132 12.1491 19.7575 11.6048 19.7575 10.9395C19.7575 10.2741 19.2132 9.72826 18.5476 9.72826Z" fill="#633511"></path></svg></option>
                                                            <option value="6"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.5781 12C20.5781 16.7376 16.7376 20.5781 12 20.5781C7.26244 20.5781 3.42188 16.7376 3.42188 12M20.5781 12C20.5781 7.26244 16.7376 3.42188 12 3.42188C7.26244 3.42188 3.42188 7.26244 3.42188 12M20.5781 12H24M3.42188 12H0" stroke="#633511" stroke-miterlimit="10"></path><path d="M17.5721 12.4352C17.3598 13.2739 17.1347 14.5209 16.1755 14.9022C15.3644 15.2246 14.5238 14.6922 13.9577 14.1409C13.2669 13.4683 12.6471 12.7147 12.0009 12C11.3547 11.2852 10.7349 10.5316 10.0441 9.85901C9.47797 9.30781 8.63731 8.77536 7.82628 9.09776C6.86703 9.47909 6.64203 10.7261 6.42969 11.5648" stroke="#633511" stroke-miterlimit="10"></path></svg></option>
                                                            <option value="7">7</option>
                                                            <option value="8"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_1283_7023)"><path d="M5.30302 12.0004C5.42542 12.0004 5.5483 11.9538 5.6419 11.8602L6.36046 11.1417C6.54766 10.9545 6.54766 10.6511 6.36046 10.4644C6.17326 10.2772 5.8699 10.2772 5.68318 10.4644L4.96462 11.1829C4.77742 11.3701 4.77742 11.6735 4.96462 11.8602C5.00895 11.9048 5.06168 11.9402 5.11977 11.9642C5.17786 11.9883 5.24015 12.0006 5.30302 12.0004ZM6.26062 8.64758C6.38302 8.64758 6.5059 8.60102 6.5995 8.50742L7.31806 7.78886C7.50526 7.60166 7.50526 7.2983 7.31806 7.11158C7.13086 6.92438 6.8275 6.92438 6.64078 7.11158L5.92222 7.83014C5.73502 8.01734 5.73502 8.3207 5.92222 8.50742C6.01199 8.59714 6.1337 8.64755 6.26062 8.64758ZM9.85342 8.64758C9.97582 8.64758 10.0987 8.60102 10.1923 8.50742L10.9109 7.78886C11.0981 7.60166 11.0981 7.2983 10.9109 7.11158C10.7237 6.92438 10.4203 6.92438 10.2336 7.11158L9.51502 7.83014C9.32782 8.01734 9.32782 8.3207 9.51502 8.50742C9.55941 8.55192 9.61216 8.58721 9.67024 8.61127C9.72831 8.63532 9.79056 8.64766 9.85342 8.64758ZM13.6853 8.64758C13.8077 8.64758 13.9305 8.60102 14.0241 8.50742L14.7427 7.78886C14.9299 7.60166 14.9299 7.2983 14.7427 7.11158C14.5555 6.92438 14.2521 6.92438 14.0654 7.11158L13.3469 7.83014C13.1597 8.01734 13.1597 8.3207 13.3469 8.50742C13.3913 8.55192 13.444 8.58721 13.5021 8.61127C13.5601 8.63532 13.6224 8.64766 13.6853 8.64758ZM18.095 8.50694L18.8136 7.78838C19.0008 7.60118 19.0008 7.29782 18.8136 7.1111C18.6264 6.9239 18.323 6.9239 18.1363 7.1111L17.4177 7.82966C17.2305 8.01686 17.2305 8.32022 17.4177 8.50694C17.5113 8.60054 17.6337 8.6471 17.7566 8.6471C17.8795 8.6471 18.0014 8.60054 18.095 8.50694ZM9.6139 12.0004C9.7363 12.0004 9.85918 11.9538 9.95278 11.8602L10.6713 11.1417C10.8585 10.9545 10.8585 10.6511 10.6713 10.4644C10.4841 10.2772 10.1808 10.2772 9.99406 10.4644L9.2755 11.1829C9.0883 11.3701 9.0883 11.6735 9.2755 11.8602C9.31983 11.9048 9.37256 11.9402 9.43065 11.9642C9.48874 11.9883 9.55103 12.0006 9.6139 12.0004ZM14.3045 10.4644L13.5859 11.1829C13.3987 11.3701 13.3987 11.6735 13.5859 11.8602C13.6795 11.9538 13.8019 12.0004 13.9248 12.0004C14.0477 12.0004 14.1701 11.9538 14.2637 11.8602L14.9822 11.1417C15.1694 10.9545 15.1694 10.6511 14.9822 10.4644C14.7945 10.2772 14.4917 10.2772 14.3045 10.4644ZM18.6153 10.4644L17.8968 11.1829C17.7096 11.3701 17.7096 11.6735 17.8968 11.8602C17.9904 11.9538 18.1128 12.0004 18.2357 12.0004C18.3585 12.0004 18.4809 11.9538 18.5745 11.8602L19.2931 11.1417C19.4803 10.9545 19.4803 10.6511 19.2931 10.4644C19.1054 10.2772 18.8025 10.2772 18.6153 10.4644Z" fill="#633511"></path><path d="M23.6561 13.3212L21.0694 6.01229C20.8669 5.43965 20.3225 5.05469 19.7149 5.05469H4.34383C3.71119 5.05469 3.14431 5.47853 2.96575 6.08525L0.820626 13.3616L0.816786 13.375C0.775026 13.5339 0.753906 13.698 0.753906 13.8627V17.0297C0.753906 18.0862 1.61359 18.9459 2.67007 18.9459H21.8297C22.8862 18.9459 23.7459 18.0862 23.7459 17.0297V13.8982C23.7449 13.7024 23.7152 13.508 23.6561 13.3212ZM22.7873 17.0297C22.7873 17.5577 22.3577 17.9878 21.8293 17.9878H2.66959C2.14159 17.9878 1.71151 17.5582 1.71151 17.0297V13.8627C1.71151 13.7825 1.72159 13.7028 1.74127 13.6251L3.88399 6.35645C3.94351 6.15437 4.13263 6.01277 4.34335 6.01277H19.7144C19.9169 6.01277 20.0984 6.14093 20.1661 6.33197L22.7441 13.6164C22.772 13.7076 22.7864 13.8022 22.7864 13.8977V17.0297H22.7873Z" fill="#633511"></path><path d="M15.6006 13.1973H3.14701C2.88253 13.1973 2.66797 13.4118 2.66797 13.6763C2.66797 13.9408 2.88253 14.1553 3.14701 14.1553H15.6006C15.8651 14.1553 16.0796 13.9408 16.0796 13.6763C16.0796 13.4118 15.8651 13.1973 15.6006 13.1973ZM21.3486 13.1973H17.9958C17.7313 13.1973 17.5168 13.4118 17.5168 13.6763C17.5168 13.9408 17.7313 14.1553 17.9958 14.1553H21.3486C21.6131 14.1553 21.8276 13.9408 21.8276 13.6763C21.8276 13.4118 21.6131 13.1973 21.3486 13.1973Z" fill="#633511"></path></g><defs><clipPath id="clip0_1283_7023"><rect width="24" height="24" fill="white" transform="translate(0.25)"></rect></clipPath></defs></svg></option>
                                                            <option value="9"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.3256 5.67038L15.705 2.04938C15.5312 1.87464 15.3245 1.7361 15.0969 1.6418C14.8692 1.5475 14.6251 1.4993 14.3786 1.50001H6C5.5029 1.5006 5.02633 1.69834 4.67483 2.04984C4.32333 2.40134 4.1256 2.87791 4.125 3.37501V20.625C4.1256 21.1221 4.32333 21.5987 4.67483 21.9502C5.02633 22.3017 5.5029 22.4994 6 22.5H18C18.4971 22.4994 18.9737 22.3017 19.3252 21.9502C19.6767 21.5987 19.8744 21.1221 19.875 20.625V6.99638C19.8757 6.75001 19.8274 6.50596 19.7331 6.27835C19.6388 6.05074 19.5003 5.8441 19.3256 5.67038ZM19.125 20.625C19.1247 20.9233 19.0061 21.2093 18.7952 21.4202C18.5843 21.6311 18.2983 21.7497 18 21.75H6C5.70172 21.7497 5.41575 21.6311 5.20483 21.4202C4.99392 21.2093 4.8753 20.9233 4.875 20.625V3.37501C4.8753 3.07673 4.99392 2.79076 5.20483 2.57984C5.41575 2.36893 5.70172 2.25031 6 2.25001H14.3786C14.5265 2.24962 14.6729 2.27855 14.8095 2.33513C14.9461 2.39171 15.0701 2.47481 15.1744 2.57963L18.7954 6.20063C18.9002 6.3049 18.9833 6.42891 19.0399 6.5655C19.0965 6.70209 19.1254 6.84854 19.125 6.99638V20.625Z" fill="#633511"></path><path d="M16.875 14.625H7.125C6.92618 14.6253 6.73559 14.7044 6.595 14.845C6.45441 14.9855 6.3753 15.1761 6.375 15.375V19.5C6.3753 19.6988 6.45441 19.8894 6.595 20.03C6.73559 20.1706 6.92618 20.2497 7.125 20.25H16.875C17.0738 20.2497 17.2644 20.1706 17.405 20.03C17.5456 19.8894 17.6247 19.6988 17.625 19.5V15.375C17.6247 15.1761 17.5456 14.9855 17.405 14.845C17.2644 14.7044 17.0738 14.6253 16.875 14.625ZM16.875 17.0625H15.75V15.375H16.875V17.0625ZM9 17.0625V15.375H10.125V17.0625H9ZM13.125 17.8125V19.5H9V17.8125H13.125ZM13.875 17.8125H15V19.5H13.875V17.8125ZM10.875 17.0625V15.375H15V17.0625H10.875ZM8.25 15.375V17.0625H7.125V15.375H8.25ZM7.125 17.8125H8.25V19.5H7.125V17.8125ZM15.75 19.5V17.8125H16.8754L16.8757 19.5H15.75ZM7.79962 8.92609C7.89702 8.9458 7.99826 8.92613 8.08119 8.87138C8.16412 8.81664 8.22198 8.73127 8.24213 8.63396C8.28826 8.41633 8.40798 8.22124 8.58113 8.08156C8.75428 7.94187 8.97028 7.86613 9.19275 7.86709H9.73013C9.91917 7.86768 10.1039 7.92385 10.2612 8.02862C10.4186 8.13339 10.5416 8.28213 10.6151 8.45631C10.6886 8.6305 10.7092 8.82244 10.6744 9.00826C10.6396 9.19407 10.5509 9.36554 10.4194 9.50134C10.2358 9.68259 9.98808 9.78395 9.73013 9.78334C9.63067 9.78334 9.53529 9.82284 9.46496 9.89317C9.39463 9.9635 9.35513 10.0589 9.35513 10.1583C9.35513 10.2578 9.39463 10.3532 9.46496 10.4235C9.53529 10.4938 9.63067 10.5333 9.73013 10.5333C9.85757 10.5308 9.98423 10.5537 10.1027 10.6008C10.2212 10.6478 10.3291 10.718 10.4201 10.8072C10.5111 10.8965 10.5834 11.0029 10.6328 11.1205C10.6822 11.238 10.7076 11.3642 10.7076 11.4916C10.7076 11.6191 10.6822 11.7453 10.6328 11.8628C10.5834 11.9803 10.5111 12.0868 10.4201 12.1761C10.3291 12.2653 10.2212 12.3355 10.1027 12.3825C9.98423 12.4296 9.85757 12.4525 9.73013 12.45H9.19275C8.97037 12.4508 8.75448 12.3751 8.58137 12.2355C8.40825 12.0959 8.28846 11.901 8.24213 11.6835C8.21997 11.5884 8.1616 11.5057 8.07943 11.4529C7.99725 11.4002 7.89774 11.3816 7.80206 11.4011C7.70638 11.4206 7.62208 11.4766 7.56707 11.5573C7.51206 11.638 7.49069 11.7369 7.5075 11.8331C7.58872 12.2198 7.80058 12.5668 8.10747 12.8157C8.41437 13.0646 8.7976 13.2003 9.19275 13.2H9.73013C10.184 13.1993 10.6193 13.0194 10.9413 12.6995C11.2633 12.3795 11.4459 11.9454 11.4495 11.4915C11.4484 11.2341 11.3888 10.9804 11.2751 10.7496C11.1614 10.5187 10.9966 10.3168 10.7933 10.1591C10.9992 10.0034 11.1657 9.80166 11.2797 9.57004C11.3937 9.33842 11.4518 9.08334 11.4495 8.82521C11.4475 8.37081 11.2654 7.93576 10.9431 7.61547C10.6207 7.29518 10.1845 7.11581 9.73013 7.11671C9.11363 7.08634 8.42587 7.13171 7.977 7.61471C7.68075 7.91096 7.179 8.72246 7.79962 8.92609ZM13.4587 13.2H15.4586C15.7349 13.1997 15.9997 13.0897 16.1949 12.8944C16.3902 12.699 16.4999 12.4341 16.5 12.1578V10.158C16.5 10.0585 16.4605 9.96312 16.3902 9.8928C16.3198 9.82247 16.2245 9.78296 16.125 9.78296H14.4585C14.359 9.78296 14.2637 9.82247 14.1933 9.8928C14.123 9.96312 14.0835 10.0585 14.0835 10.158C14.0835 10.2574 14.123 10.3528 14.1933 10.4231C14.2637 10.4935 14.359 10.533 14.4585 10.533H15.75V12.1578C15.7499 12.2351 15.7192 12.3091 15.6645 12.3638C15.6099 12.4184 15.5359 12.4491 15.4586 12.4492H13.4587C13.3814 12.4492 13.3073 12.4185 13.2526 12.3639C13.1979 12.3093 13.1671 12.2351 13.167 12.1578V8.15884C13.1671 8.08152 13.1979 8.00741 13.2526 7.95278C13.3073 7.89815 13.3814 7.86746 13.4587 7.86746H15.4586C15.5359 7.86756 15.6099 7.89829 15.6645 7.95291C15.7192 8.00753 15.7499 8.08159 15.75 8.15884V8.62046C15.75 8.71992 15.7895 8.8153 15.8598 8.88563C15.9302 8.95595 16.0255 8.99546 16.125 8.99546C16.2245 8.99546 16.3198 8.95595 16.3902 8.88563C16.4605 8.8153 16.5 8.71992 16.5 8.62046V8.15884C16.4998 7.88267 16.39 7.61787 16.1948 7.42256C15.9995 7.22725 15.7348 7.11738 15.4586 7.11709H13.4587C13.1825 7.11728 12.9177 7.2271 12.7223 7.42243C12.527 7.61775 12.4172 7.88261 12.417 8.15884V12.1582C12.4173 12.4344 12.5272 12.6991 12.7225 12.8944C12.9178 13.0896 13.1826 13.1998 13.4587 13.2Z" fill="#633511"></path></svg></option>
                                                            <option value="10"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_363_6559)"><path d="M12.668 0.580078C6.05094 0.580078 0.667969 5.4424 0.667969 11.4188C0.667969 11.5215 0.708752 11.6199 0.781347 11.6925C0.853942 11.7651 0.952401 11.8059 1.05507 11.8059H11.5067V21.0962H7.24861C7.14595 21.0962 7.04749 21.137 6.97489 21.2096C6.9023 21.2822 6.86152 21.3806 6.86152 21.4833V23.0317C6.86152 23.1344 6.9023 23.2328 6.97489 23.3054C7.04749 23.378 7.14595 23.4188 7.24861 23.4188H18.0873C18.19 23.4188 18.2884 23.378 18.361 23.3054C18.4336 23.2328 18.4744 23.1344 18.4744 23.0317V21.4833C18.4744 21.3806 18.4336 21.2822 18.361 21.2096C18.2884 21.137 18.19 21.0962 18.0873 21.0962H13.8293V11.8059H19.6357V14.5156C19.638 14.5383 19.6426 14.5607 19.6493 14.5825C19.042 14.7889 18.7169 15.4484 18.9233 16.0556C19.1296 16.6629 19.7891 16.9879 20.3964 16.7817C21.0036 16.5754 21.3287 15.9158 21.1224 15.3085C21.0651 15.14 20.9698 14.9868 20.844 14.8609C20.7181 14.735 20.5649 14.6398 20.3964 14.5825C20.403 14.5607 20.4076 14.5383 20.4099 14.5156V11.8059H24.2809C24.3835 11.8059 24.482 11.7651 24.5546 11.6925C24.6272 11.6199 24.668 11.5215 24.668 11.4188C24.668 5.4424 19.285 0.580078 12.668 0.580078ZM17.7002 21.8704V22.6446H7.63571V21.8704H17.7002ZM12.2809 21.0962V11.8059H13.0551V21.0962H12.2809ZM20.4099 15.6769C20.4099 15.7795 20.3691 15.878 20.2965 15.9506C20.2239 16.0232 20.1255 16.0639 20.0228 16.0639C19.9201 16.0639 19.8217 16.0232 19.7491 15.9506C19.6765 15.878 19.6357 15.7795 19.6357 15.6769C19.6357 15.5742 19.6765 15.4757 19.7491 15.4031C19.8217 15.3305 19.9201 15.2898 20.0228 15.2898C20.1255 15.2898 20.2239 15.3305 20.2965 15.4031C20.3691 15.4757 20.4099 15.5742 20.4099 15.6769ZM1.45029 11.0317C1.6779 5.66111 6.62268 1.35427 12.668 1.35427C18.7133 1.35427 23.658 5.66111 23.8856 11.0317H1.45029Z" fill="#633511"></path></g><defs><clipPath id="clip0_363_6559"><rect width="24" height="24" fill="white" transform="translate(0.667969)"></rect></clipPath></defs></svg></option>
                                                        </select> --}}

                                                        <div x-data="{open: false, selectedOption: 'Option 1', options: [
                                                            { text: 'Option 1', value: '0', svg: '<svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g clip-path="url(#clip0_363_6559)"><path d="M12.668 0.580078C6.05094 0.580078 0.667969 5.4424 0.667969 11.4188C0.667969 11.5215 0.708752 11.6199 0.781347 11.6925C0.853942 11.7651 0.952401 11.8059 1.05507 11.8059H11.5067V21.0962H7.24861C7.14595 21.0962 7.04749 21.137 6.97489 21.2096C6.9023 21.2822 6.86152 21.3806 6.86152 21.4833V23.0317C6.86152 23.1344 6.9023 23.2328 6.97489 23.3054C7.04749 23.378 7.14595 23.4188 7.24861 23.4188H18.0873C18.19 23.4188 18.2884 23.378 18.361 23.3054C18.4336 23.2328 18.4744 23.1344 18.4744 23.0317V21.4833C18.4744 21.3806 18.4336 21.2822 18.361 21.2096C18.2884 21.137 18.19 21.0962 18.0873 21.0962H13.8293V11.8059H19.6357V14.5156C19.638 14.5383 19.6426 14.5607 19.6493 14.5825C19.042 14.7889 18.7169 15.4484 18.9233 16.0556C19.1296 16.6629 19.7891 16.9879 20.3964 16.7817C21.0036 16.5754 21.3287 15.9158 21.1224 15.3085C21.0651 15.14 20.9698 14.9868 20.844 14.8609C20.7181 14.735 20.5649 14.6398 20.3964 14.5825C20.403 14.5607 20.4076 14.5383 20.4099 14.5156V11.8059H24.2809C24.3835 11.8059 24.482 11.7651 24.5546 11.6925C24.6272 11.6199 24.668 11.5215 24.668 11.4188C24.668 5.4424 19.285 0.580078 12.668 0.580078ZM17.7002 21.8704V22.6446H7.63571V21.8704H17.7002ZM12.2809 21.0962V11.8059H13.0551V21.0962H12.2809ZM20.4099 15.6769C20.4099 15.7795 20.3691 15.878 20.2965 15.9506C20.2239 16.0232 20.1255 16.0639 20.0228 16.0639C19.9201 16.0639 19.8217 16.0232 19.7491 15.9506C19.6765 15.878 19.6357 15.7795 19.6357 15.6769C19.6357 15.5742 19.6765 15.4757 19.7491 15.4031C19.8217 15.3305 19.9201 15.2898 20.0228 15.2898C20.1255 15.2898 20.2239 15.3305 20.2965 15.4031C20.3691 15.4757 20.4099 15.5742 20.4099 15.6769ZM1.45029 11.0317C1.6779 5.66111 6.62268 1.35427 12.668 1.35427C18.7133 1.35427 23.658 5.66111 23.8856 11.0317H1.45029Z" fill="#633511"></path></g><defs><clipPath id="clip0_363_6559"><rect width="24" height="24" fill="white" transform="translate(0.667969)"></rect></clipPath></defs></svg>' },
                                                            { text: 'Option 1', value: '1', svg: '<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M19.1456 20.544V10.6414C19.1456 10.5419 19.1061 10.4465 19.0358 10.3762C18.9654 10.3059 18.8701 10.2664 18.7706 10.2664H17.787V5.22262C17.787 5.12317 17.7475 5.02779 17.6771 4.95746C17.6068 4.88713 17.5114 4.84762 17.412 4.84762H15.7158V1.125C15.7158 1.02554 15.6763 0.930161 15.606 0.859835C15.5357 0.789509 15.4403 0.75 15.3408 0.75C15.2414 0.75 15.146 0.789509 15.0757 0.859835C15.0054 0.930161 14.9658 1.02554 14.9658 1.125V4.84762H9.03522V1.125C9.03522 1.02554 8.99571 0.930161 8.92538 0.859835C8.85506 0.789509 8.75967 0.75 8.66022 0.75C8.56076 0.75 8.46538 0.789509 8.39505 0.859835C8.32473 0.930161 8.28522 1.02554 8.28522 1.125V4.84762H6.58909C6.48964 4.84762 6.39425 4.88713 6.32393 4.95746C6.2536 5.02779 6.21409 5.12317 6.21409 5.22262V10.2667H5.23047C5.13101 10.2667 5.03563 10.3063 4.9653 10.3766C4.89498 10.4469 4.85547 10.5423 4.85547 10.6417V20.5444C4.85547 22.0365 6.06934 23.2504 7.56147 23.2504H16.4396C17.9317 23.2504 19.1456 22.0361 19.1456 20.544ZM6.96409 5.59762H17.037V10.2667H6.96409V5.59762ZM16.4396 22.5H7.56184C7.04326 22.4994 6.54609 22.2931 6.1794 21.9264C5.81271 21.5597 5.60644 21.0626 5.60584 20.544V11.0164H18.3956V20.544C18.395 21.0626 18.1887 21.5597 17.822 21.9264C17.4553 22.2931 16.9582 22.4994 16.4396 22.5Z" fill="#633511"></path><path d="M13.1551 14.7623C13.1203 14.7274 13.079 14.6998 13.0335 14.6809C12.988 14.6621 12.9392 14.6523 12.89 14.6523C12.8407 14.6523 12.7919 14.6621 12.7464 14.6809C12.7009 14.6998 12.6596 14.7274 12.6248 14.7623L10.8481 16.539C10.7956 16.5915 10.7599 16.6583 10.7455 16.731C10.731 16.8038 10.7384 16.8792 10.7668 16.9477C10.7952 17.0162 10.8433 17.0747 10.9049 17.1159C10.9666 17.1572 11.039 17.1792 11.1132 17.1792H11.9847L10.9407 18.2232C10.9059 18.258 10.8783 18.2993 10.8594 18.3448C10.8406 18.3903 10.8309 18.4391 10.8309 18.4883C10.8309 18.5375 10.8406 18.5863 10.8594 18.6318C10.8783 18.6773 10.9059 18.7186 10.9407 18.7534C10.9755 18.7882 11.0169 18.8159 11.0623 18.8347C11.1078 18.8535 11.1566 18.8632 11.2058 18.8632C11.2551 18.8632 11.3038 18.8535 11.3493 18.8347C11.3948 18.8159 11.4361 18.7882 11.471 18.7534L13.1551 17.0693C13.2075 17.0168 13.2432 16.95 13.2577 16.8773C13.2721 16.8046 13.2647 16.7292 13.2363 16.6607C13.208 16.5922 13.1599 16.5336 13.0982 16.4924C13.0366 16.4512 12.9641 16.4292 12.89 16.4292H12.0185L13.1551 15.2925C13.1899 15.2577 13.2176 15.2164 13.2364 15.1709C13.2553 15.1254 13.265 15.0767 13.265 15.0274C13.265 14.9782 13.2553 14.9294 13.2364 14.8839C13.2176 14.8384 13.1899 14.7971 13.1551 14.7623Z" fill="#633511"></path><path d="M12.0014 12.5938C9.70456 12.5938 7.83594 14.4624 7.83594 16.7592C7.83594 19.0561 9.70456 20.9247 12.0014 20.9247C14.2983 20.9247 16.1669 19.0561 16.1669 16.7592C16.1669 14.4624 14.2983 12.5938 12.0014 12.5938ZM12.0014 20.1747C10.1182 20.1747 8.58594 18.6425 8.58594 16.7592C8.58594 14.876 10.1182 13.3437 12.0014 13.3437C13.8847 13.3437 15.4169 14.876 15.4169 16.7592C15.4169 18.6425 13.8847 20.1747 12.0014 20.1747Z" fill="#633511"></path></svg>' },
                                                            { text: 'Option 2', value: '2', svg: '' },
                                                            { text: 'Option 3', value: '3', svg: '' },
                                                            { text: 'Option 4', value: '4', svg: '' },
                                                            { text: 'Option 4', value: '5', svg: '' },
                                                            { text: 'Option 4', value: '6', svg: '' },
                                                            { text: 'Option 4', value: '7', svg: '' },
                                                            { text: 'Option 4', value: '8', svg: '' },
                                                            { text: 'Option 4', value: '9', svg: '' },
                                                            { text: 'Option 4', value: '10', svg: '' },
                                                        ]}" x-model="value.icon">

                                                            <!-- Selected option -->
                                                            <div @click="open = !open" x-html="selectedOption" class="selected"></div>

                                                            <!-- Dropdown options -->
                                                            <div x-show="open" class="options" @click.away="open = false">
                                                                <template x-for="option in options" :key="option.value">
                                                                <div @click="selectedOption = option.svg; value.icon = option.value; open = false"
                                                                    class="option" x-html="option.svg"></div>
                                                                </template>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div>
                                                    <div>Title 3 sub VietNam</div>
                                                    <div>
                                                        <input type="text" x-model="value.title3_sub_vn" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title3_sub_vn.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title3_sub_vn.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title 3 sub English</div>
                                                    <div>
                                                        <input type="text" x-model="value.title3_sub_en" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title3_sub_en.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title3_sub_en.${index}`]"></div>
                                                    </template>
                                                </div>
                                                <div>
                                                    <div>Title 3 sub Japan</div>
                                                    <div>
                                                        <input type="text" x-model="value.title3_sub_jp" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                    <template x-if="data_error[`title3_sub_jp.${index}`]">
                                                        <div class="text-red-500" x-text="data_error[`title3_sub_jp.${index}`]"></div>
                                                    </template>
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
                    <button type="button" x-on:click="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                </div>
            </div>
        </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
        });
    </script>
@endsection
