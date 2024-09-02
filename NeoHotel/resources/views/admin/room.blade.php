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
                                            <div class="my-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
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
