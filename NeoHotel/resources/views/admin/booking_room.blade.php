@extends('admin.layout_admin')
@section('content')
    <div class="" x-data="{
        isCheck : false,
        data_id : '',
        data: {
            price: '',
            end_date: '',
            room_name: '',
            start_date: '',
        },
        data_detail : [],
        openFunction: function(id) {
            console.log(id);
            this.isCheck = true
            this.data_id = id;

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
                this.data_detail = data;
            }).catch((error) => {
                console.error('Error:', error);
            });
        },
        checkOut: function(id) {
            let url = '{{ route('admin.checkOutBookingRoom') }}';

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
                location.reload();
            }).catch((error) => {
                console.error('Error:', error);
            });
        },
        cloneRow: function() {
            this.data_detail.push({
                    'service_id' : '',
                    'sl' : 1,
                    'price' : 0,
                    'money' : 0,
                });
        },
        removeRow: function() {
            this.data_detail.pop();
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

        <div class="w-full flex items-center justify-center m-6">
            <form action="{{route('admin.booking_room')}}" method="get" class="flex items-center justify-center">
                <div>
                    <input type="date" name="start_date" required value="{{$start_date}}" class="mx-2 p-1 border border-black rounded">
                    <input type="date" name="end_date" required value="{{$end_date}}" class="mx-2 p-1 border border-black rounded">
                </div>

                <div>
                    <input type="submit" class="px-6 py-1.5 bg-blue-500 text-white rounded" value="Search">
                </div>
            </form>
        </div>

        <div class="py-2">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($listRooms as $item)
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <div class="grid grid-cols-2">
                            <div>Room : {{$item['room_code']}}</div>
                            <div>name : {{$item['room_name']}}</div>
                        </div>
                        <div>Customer : {{$item['customer']}}</div>
                        <div>Type : {{$room_type[$item['room_type']]}}</div>
                        <div class="grid grid-cols-2">
                            <div>Start date: {{$item['start_date']}}</div>
                            <div>End date: {{$item['end_date']}}</div>
                        </div>
                        <div class="grid grid-cols-1">
                            <div>
                                Status :
                                @if ($item['status'] == 1)
                                    <button type="button" x-on:click="openFunction('{{$item['booking_id']}}')" class="inline-flex items-center px-5 py-1.5 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                        Invoice
                                    </button>

                                    <button type="button" x-on:click="checkOut('{{$item['booking_id']}}')" class="inline-flex items-center px-5 py-1.5 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                        check out
                                    </button>
                                @else
                                    <button type="button" class="inline-flex items-center px-5 py-1.5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-red-300">
                                        Empty
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

         <!-- Popup chọn phòng -->
         <div x-show="isCheck" class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>

                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-3xl w-full">
                    <form action="{{route('admin.booking_service.save')}}" method="post" class="w-full">
                        @csrf
                        <input type="hidden" name="id" x-model="data_id">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="w-full">
                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Check</h3>
                                    <div class="mt-2">
                                        <div class="">
                                            Room : <span x-text="data.room_name"></span>
                                            Price : <input type="number" name x-model="data.price">
                                        </div>
                                        <div>
                                            Start date: <span x-text="data.start_date"></span>
                                            End date: <span x-text="data.end_date"></span>
                                        </div>
                                        <div class="flex items-center">
                                            <h3>Service</h3>
                                            <div class="ml-4">
                                                <button type="button" x-on:click="cloneRow" class="inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                                                    Add service
                                                </button>

                                                <button type="button" x-on:click="removeRow" class="ml-2 inline-flex items-center px-5 py-2.5 text-sm font-medium text-center text-white rounded-lg bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300">
                                                    Remove service
                                                </button>
                                            </div>
                                        </div>
                                        <div>
                                            <template x-if="data_detail.length == 0">
                                                <div class="grid custom-grid gap-2 row-service">
                                                    <div class="w-full">
                                                        <div class="w-full">Service name</div>
                                                        <div class="w-full">
                                                            <select name="data[service_id][]" required class="select-service bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                                                            <input type="number" name="data[sl][]" value="1" min="1" class="input-sl text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="w-full">Price</div>
                                                        <div class="w-full">
                                                            <input type="number" name="data[price][]" required value="0" min="0" class="input-price text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                    <div class="w-full">
                                                        <div class="w-full">Money</div>
                                                        <div class="w-full">
                                                            <input type="number" name="data[money][]" required value="0" min="0" readonly class="input-money text-right bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
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
                            <button type="button" x-on:click="isCheck = false" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Close</button>
                            <button type="submit" class="mt-3 w-full inline-flex justify-center rounded-md border border-blue-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-blue-700 hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).on("change", ".select-service", function() {
            var price = $(this).find(':selected').data('price');
            $(this).parents('.row-service').find('.input-sl').val(1);
            $(this).parents('.row-service').find('.input-price').val(price);
            $(this).parents('.row-service').find('.input-money').val(price);
        });

        $(document).on("change keyup", ".input-sl", function() {
            let sl = $(this).val();
            let price = $(this).parents('.row-service').find('.input-price').val();

            let money = Number(sl) * Number(price);
            $(this).parents('.row-service').find('.input-money').val(money);

        });

        $(document).on("change keyup", ".input-price", function() {
            let price = $(this).val();
            let sl = $(this).parents('.row-service').find('.input-sl').val();

            let money = Number(sl) * Number(price);
            $(this).parents('.row-service').find('.input-money').val(money);
        });
    </script>
@endsection
