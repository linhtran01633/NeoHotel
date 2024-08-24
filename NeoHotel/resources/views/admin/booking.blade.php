@extends('admin.layout_admin')
@section('content')
    <div x-data="{
        created: false,
        isDetail : false,
        isWaiting: false,
        isBill: false,
        infomation: {},
        data_detail: [],
        data_search: {
            id: '',
        },
        data: {
            id : '',
            room_id: [],
            end_date: '',
            start_date: '',
            number_of_rooms: '',
        },
        data_edit: {
            id : '',
            adult: '',
            c_phone: '',
            c_email: '',
            end_date: '',
            children: '',
            room_type: '',
            start_date: '',
            c_last_name: '',
            c_first_name: '',
            number_of_rooms: '',
        },
        waitingFunction: function(id, number_of_rooms, start_date, end_date) {
            this.data.id = id;
            this.data.end_date = end_date;
            this.data.start_date = start_date;
            this.data.number_of_rooms = number_of_rooms;

            let url_post = '{{ route("admin.room.search") }}';
            fetch(url_post, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify(this.data),
            })
            .then((response) => response.json())
            .then(result => {
                $('.list_room').empty()
                 if (Array.isArray(result)) {
                    result.forEach((elm, index) => {
                        $('.list_room').append(`
                            <label for='room${index}' class='m-2'>
                                <input type='checkbox' class='array_room_id' name='room_id[]' value='${elm.id}' id='room${index}' />
                                ${elm.room_code}
                            </label>
                        `)
                    });
                } else {
                    console.error('result is not an array');
                }
            }).catch((error) => {
                console.error('Error : ', error);
            });

            this.isWaiting = true
        },

        saveBookingRoom: function(){
            let value = Array.from(document.querySelectorAll(`input[name='room_id[]']:checked`)).map((el) => el.value)

            if(value.length == this.data.number_of_rooms) {
                this.data.room_id = value;

                let url_post = '{{ route("admin.bookingRoom") }}';
                fetch(url_post, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'Accept': 'application/json, text-plain, */*',
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                    },
                    body: JSON.stringify(this.data),
                })
                .then((response) => response.json())
                .then(result => {
                    window.location.reload();
                }).catch((error) => {
                    console.error('Error : ', error);
                });
            } else {
                $('#error_text_submit_booking_room').empty().text('Please choose a room');
            }

        },

        detailFunction: function(id) {
            let url_post = '{{ route("admin.booking.search") }}';
            this.data_search.id = id
            fetch(url_post, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                },

                body: JSON.stringify(this.data_search),
            })
            .then((response) => response.json())
            .then(result => {
                if (Object.keys(result).length > 0) {
                    console.log(result);
                    this.data_edit = result
                }
            }).catch((error) => {
                console.error('Error : ', error);
            });

            this.isDetail = true
        },

        saveBookingEdit: function() {
            if (this.$refs.bookingEditForm.checkValidity()) {
                $('#submitBookingEditForm').submit()
            } else {
                this.$refs.bookingEditForm.reportValidity()
            }
        },

        showBill: function(id) {
            console.log(id);

            this.isBill = !this.isBill

             let url = '{{ route('admin.booking_service.get') }}';

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json, text-plain, */*',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name=csrf-token]').content
                },
                body: JSON.stringify({booking_id : id}),
            })
            .then((response) => response.json())
            .then(data => {
                console.log(data)
                this.data_detail = data.service;
                this.infomation = data.infomation;
            }).catch((error) => {
                console.error('Error:', error);
            });
        },
    }">
        <button type="submit" x-on:click="created = !created" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Booking
        </button>
        <div x-show="created" class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Booking Form</h2>
            <form  action="{{route('admin.booking.save')}}" method="POST" class="max-w-2xl mx-auto" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id_edit">
                <div class="grid sm:grid-cols-2 gap-2">
                    <div class="w-full">
                        <label for="c_first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                        <input type="text" name="c_first_name" id="c_first_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                    </div>
                    <div class="w-full">
                        <label for="c_last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                        <input type="text" name="c_last_name" id="c_last_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                    </div>
                    <div class="w-full">
                        <label for="c_email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="c_email" id="c_email" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                    </div>

                    <div class="w-full">
                        <label for="c_phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                        <input type="tel" name="c_phone" id="c_phone" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Phone" required="">
                    </div>

                    <div  class="w-full">
                        <label for="room_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Name</label>
                        <select id="room_type" required name="room_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($room_type as $key=>$value)
                                <option value="{{$key}}">{{$value}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="number_of_rooms" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of rooms </label>
                        <input type="number" name="number_of_rooms" id="number_of_rooms" min="1" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="number of rooms" required="">
                    </div>

                    <div class="w-full">
                        <label for="adult" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adult</label>
                        <input type="number" name="adult" id="adult" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Adult" required="">
                    </div>

                    <div class="w-full">
                        <label for="children" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Children</label>
                        <input type="number" name="children" id="children" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Children" required="">
                    </div>

                    <div class="w-full">
                        <label for="start_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check-in Date</label>
                        <input type="date" name="start_date" id="start_date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Thương Hiệu" required="">
                    </div>
                    <div class="w-full">
                        <label for="end_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check-out Date</label>
                        <input type="date" name="end_date" id="end_date" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="VND" required="">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Booking
                    </button>
                </div>
            </form>
        </div>

        <div class="container mx-auto">
            <h1 class="text-2xl font-bold mb-4">Table Booking</h1>
            <div class="overflow-x-auto">
                <table id="table" class="min-w-full border border-gray-300 table-auto">
                    <thead>
                        <tr class="bg-sidebar">
                            <th class="min-w-24 py-2 px-4 border-b">ID Booking</th>
                            <th class="min-w-44 py-2 px-4 border-b">Customer name</th>
                            <th class="min-w-28 py-2 px-4 border-b">Room type</th>
                            <th class="min-w-24 py-2 px-4 border-b">Start date</th>
                            <th class="min-w-24 py-2 px-4 border-b">End date</th>
                            <th class="min-w-24 py-2 px-4 border-b">Number of room</th>
                            <th class="min-w-44 py-2 px-4 border-b">Status</th>
                        </tr>
                    </thead>

                </table>
            </div>
        </div>

        <!-- Popup chọn phòng -->
        <div x-show="isWaiting" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Selete rooms</h3>
                                <div class="mt-2">
                                    <div class="my-1 w-full">
                                        <span class="text-red-700 text-center" id="error_text_submit_booking_room"></span>
                                    </div>
                                    <div class="grid grid-cols-2 gap-6">
                                        <div>Start date: <span x-text="data.start_date"></span></div>
                                        <div>End date: <span x-text="data.end_date"></span></div>
                                    </div>
                                    <!-- Danh sách phòng để chọn -->
                                    <div class="list_room">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" x-on:click="isWaiting = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>

                        <button type="button" x-on:click="saveBookingRoom()" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                        <a :href="`booking/delete/${data.id}`">
                            <button type="button" x-on:click="isWaiting = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-red-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-red-700 hover:bg-red-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Delete booking</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>

          <!-- Popup chọn phòng -->
        <div x-show="isDetail" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="w-full">
                            <div class="mt-3 sm:mt-0 text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Edit</h3>
                                <div class="mt-2">
                                    <form  x-ref="bookingEditForm" action="{{route('admin.booking.save')}}" method="post" id="submitBookingEditForm" class="max-w-2xl mx-auto">
                                        @csrf
                                        <input type="hidden" name="id" id="id_edit" x-model="data_edit.id">
                                        <div class="grid sm:grid-cols-2 gap-2">
                                            <div class="w-full">
                                                <label for="first_name_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
                                                <input type="text" x-model="data_edit.c_first_name" name="c_first_name" id="first_name_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="First Name" required="">
                                            </div>
                                            <div class="w-full">
                                                <label for="last_name_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
                                                <input type="text" x-model="data_edit.c_last_name" name="c_last_name" id="last_name_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Last Name" required="">
                                            </div>
                                            <div class="w-full">
                                                <label for="email_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                <input type="email" x-model="data_edit.c_email" name="c_email" id="email_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email" required="">
                                            </div>

                                            <div class="w-full">
                                                <label for="phone_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
                                                <input type="tel" x-model="data_edit.c_phone" name="c_phone" id="phone_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Phone" required="">
                                            </div>

                                            <div  class="w-full">
                                                <label for="room_type_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room Name</label>
                                                <select id="room_type_edit" x-model="data_edit.room_type" required name="room_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    @foreach ($room_type as $key=>$value)
                                                        <option value="{{$key}}">{{$value}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="w-full">
                                                <label for="number_of_rooms_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Number of rooms </label>
                                                <input type="number" x-model="data_edit.number_of_rooms" min="1" name="number_of_rooms" id="number_of_rooms_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="number of rooms" required="">
                                            </div>

                                            <div class="w-full">
                                                <label for="adult_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Adult</label>
                                                <input type="number" x-model="data_edit.adult" name="adult" id="adult_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Adult" required="">
                                            </div>

                                            <div class="w-full">
                                                <label for="children_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Children</label>
                                                <input type="number" x-model="data_edit.children" name="children" id="children_edit" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Children" required="">
                                            </div>

                                            <div class="w-full">
                                                <label for="start_date_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check-in Date</label>
                                                <input type="date"  name="start_date" id="start_date_edit"  x-model="data_edit.start_date" size="12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                            </div>
                                            <div class="w-full">
                                                <label for="end_date_edit" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Check-out Date</label>
                                                <input type="date" name="end_date" id="end_date_edit"  x-model="data_edit.end_date" size="12" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required="">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" x-on:click="isDetail = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                        <button type="button" x-on:click="saveBookingEdit()" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Popup chọn phòng -->
        <div x-show="isBill" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl w-full">
                    <div class="w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="w-full">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">BILL</h3>
                                    <div class="mt-2">
                                        <div>
                                            <div class="grid custom-grid gap-2 row-service">
                                                <div class="w-full">
                                                    <div class="w-full">Service name</div>
                                                    <div class="w-full">
                                                        <select class="select-service bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                            <option value="">Room rate</option>
                                                        </select>
                                                    </div>
                                                    <div class="w-full"></div>
                                                </div>
                                                <div class="w-full">
                                                    <div class="w-full">SL day</div>
                                                    <div class="w-full">
                                                        <input type="number" name="number_of_day" x-model="infomation.number_of_day" min="1" class="input-sl text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                </div>
                                                <div class="w-full">
                                                    <div class="w-full">Price</div>
                                                    <div class="w-full">
                                                        <input type="number" name="room_amount" x-model="infomation.room_amount" required value="0" min="0" class="input-price text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                </div>
                                                <div class="w-full">
                                                    <div class="w-full">Money</div>
                                                    <div class="w-full">
                                                        <input type="number" name="amount" x-model="infomation.amount" required value="0" min="0" readonly class="input-money text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <template x-for="(value, key) in data_detail" :key="key">
                                                <div class="grid custom-grid gap-2 row-service">
                                                    <div class="w-full">
                                                        <div class="w-full">Service name</div>
                                                        <div class="w-full">
                                                            <select name="data[service_id][]" x-model="value.service_id" required class="select-service bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                                <option value="" data-price="0">Select option</option>
                                                                @foreach ($service as $item)
                                                                    <option value="{{$item->id}}" data-price="{{$item->price}}">{{$item->service_name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="w-full">SL</div>
                                                        <div class="w-full">
                                                            <input type="number" name="data[sl][]" required x-model="value.sl" value="1" min="1" class="input-sl text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="w-full">Price</div>
                                                        <div class="w-full">
                                                            <input type="number" name="data[price][]" x-model="value.price" required value="0" min="0" class="input-price text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="w-full">Money</div>
                                                        <div class="w-full">
                                                            <input type="number" name="data[money][]" x-model="value.money" required value="0" min="0" readonly class="input-money text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" x-on:click="isBill = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script>
        $(document).ready(function() {
            var CallDataTableURL = '{!! route('admin.booking') !!}';
            var table = $('#table').DataTable({
                paging: true,
                pagingType: 'simple',
                pageLength: 10,
                scrollX: true,
                processing: true,
                serverSide: true,
                searching: false,
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
                        data: "c_name",
                        defaultContent: "",
                    },
                    {
                        data: "room_type",
                        defaultContent: "",
                    },
                    {
                        data: "start_date",
                        defaultContent: "",
                    },
                    {
                        data: "end_date",
                        defaultContent: "",
                    },
                    {
                        data: "room_names",
                        className: "text-center",
                        defaultContent: "",
                    },
                    {
                        data: null,
                        className: "dt-center editor-delete flex justify-start",
                        render : function ( data, type, row ) {
                            console.log(row);

                            let html =  ``;
                            if(row.status == 0) {
                                html += `
                                <button type="button" x-on:click="detailFunction('${row.id}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                    Detail
                                </button>
                                <button type="button" x-on:click="waitingFunction('${row.id}','${row.number_of_rooms}','${row.start_date}', '${row.end_date}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                    Waiting
                                </button>
                                `;
                            } else if(row.status == 1) {
                                html += `
                                <button type="button" x-on:click="detailFunction('${row.id}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                    Detail
                                </button>
                                <button type="button" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-blue-300">
                                    Canceled
                                </button>`
                            } else if(row.status == 2) {
                                html += `
                                <button type="button" x-on:click="detailFunction('${row.id}')" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                    Detail
                                </button>
                                <button type="button" class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-blue-300">
                                    Processed
                                </button>
                                <button type="button" x-on:click="showBill('${row.id}')"  class="inline-flex items-center px-5 py-2.5 mx-1 text-sm font-medium text-center text-white rounded-lg bg-yellow-700 hover:bg-yellow-800 focus:ring-4 focus:ring-blue-300">
                                    Bill
                                </button>`
                            }

                            return html;
                        }
                    }
                ],
            });
        });

    </script>
@endsection
