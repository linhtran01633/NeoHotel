@extends('admin.layout_admin')
@section('content')
    <div class="" x-data="{
        data: {},
        data_error: {},
        isSave : false,
        message_save : '',
        submitForm: function() {
             let url_post = '{{ route("admin.room.save") }}';
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
                    if(result.success == true) {
                        window.location.reload();
                    } else {
                        this.data_error = Object.fromEntries(
                            Object.entries(result.errors).map(([key, value]) => [key, value[0]])
                        );
                    }
                }).catch((error) => {
                    console.error('Error : ', error);
                });
        }
    }">

        @if (Session::has('message'))
            <div class="text-red-500 p-2">
                {{ Session::get('message') }}
                @php
                    Session::forget('message');
                @endphp
            </div>
        @endif

        <button type="submit" x-on:click="isSave = !isSave" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Room
        </button>

        <div class="py-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($listRooms as $item)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="grid grid-cols-2">
                            <div >
                                Room number : {{$item->room_code}}
                            </div>
                            <div >
                                Room name : {{$item->room_name}}
                            </div>
                        </div>

                        <div>
                            Room type : {{$room_type[$item->room_type]}}
                        </div>

                        <div>
                            Price : {{ number_format($item->price)}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

          <!-- Popup edit -->
          <div x-show="isSave" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-start justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl w-full">
                    <div class="w-full">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="w-full">
                                <div class="mt-3 sm:mt-0 sm:ml-4 text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Room Form</h3>
                                    <div class="text-red-500 my-2 px-2" x-text="message_save"></div>
                                    <div class="mt-2">
                                        <input type="hidden" name="id" id="id_edit">
                                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                            <div class="w-full">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room code</label>
                                                <input type="text" x-model="data.room_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room code">
                                                <div class="text-red-500" x-text="data_error.room_code"></div>
                                            </div>

                                            <div class="w-full">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room name</label>
                                                <input type="text" x-model="data.room_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room name">
                                                <div class="text-red-500" x-text="data_error.room_name"></div>
                                            </div>

                                            <div  class="w-full">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room type</label>
                                                <select x-model="data.room_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option value="">select room type</option></option>
                                                    @foreach ($room_type as $key=>$item)
                                                        <option value="{{$key}}">{{$item}}</option>
                                                    @endforeach
                                                </select>
                                                <div class="text-red-500" x-text="data_error.room_type"></div>
                                            </div>

                                            <div class="w-full">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                                                <input type="text" x-model="data.price" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Price">
                                                <div class="text-red-500" x-text="data_error.price"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button type="button" x-on:click="submitForm" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Create Room</button>
                            <button type="button" x-on:click="isSave = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
@endsection
