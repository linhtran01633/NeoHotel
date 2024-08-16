@extends('admin.layout_admin')
@section('content')
    <div class="" x-data="{
        created : false,
    }">

        @if (Session::has('message'))
            <div class="text-red-500 p-2">
                {{ Session::get('message') }}
                @php
                    Session::forget('message');
                @endphp
            </div>
        @endif

        <button type="submit" x-on:click="created = !created" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
            Create Room
        </button>
        <div x-show="created" class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Room Form</h2>
            <form  action="{{route('admin.room.save')}}" method="POST" class="max-w-2xl mx-auto" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id_edit">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="room_code" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room code</label>
                        <input type="text" name="room_code" id="room_code" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room code" required="">
                    </div>

                    <div class="w-full">
                        <label for="room_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room name</label>
                        <input type="text" name="room_name" id="room_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room name" required="">
                    </div>

                    <div  class="w-full">
                        <label for="room_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room type</label>
                        <select id="room_type" required name="room_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            @foreach ($room_type as $key=>$item)
                                <option value="{{$key}}">{{$item}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="price" id="price" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Price" required="">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Create Room
                    </button>
                </div>
            </form>
        </div>

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
    </div>

@endsection
@section('scripts')
@endsection
