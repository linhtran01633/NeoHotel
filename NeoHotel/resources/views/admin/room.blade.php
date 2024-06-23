@extends('admin.layout_admin')
@section('content')
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Room Form</h2>
        <form  action="" method="POST" class="max-w-2xl mx-auto" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" id="id_edit">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="w-full">
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room name</label>
                    <input type="text" name="first_name" id="first_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room name" required="">
                </div>

                <div  class="w-full">
                    <label for="room_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room type</label>
                    <select id="room_id" required name="room_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        @foreach ($room_type as $key=>$item)
                            <option value="{{$key}}">{{$item}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="w-full">
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                    <input type="text" name="last_name" id="last_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Price" required="">
                </div>
                <div class="w-full">
                    <label for="room_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Room area</label>
                    <input type="text" name="room_area" id="room_area" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Room area" required="">
                </div>

                <div class="w-full">
                    <label for="bed_area" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bed area</label>
                    <input type="text" name="bed_area" id="bed_area" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Bed area" required="">
                </div>

                <div class="w-full">
                    <label for="window" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">window</label>
                    <input type="text" name="window" id="window" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="window" required="">
                </div>

                <div class="sm:col-span-2">
                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                    <input type="file" name="image[]" id="image" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Thương Hiệu" required="">
                </div>
                <div class="sm:col-span-2">
                    <label for="detail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Detail</label>
                    <textarea id="detail" rows="4" name="detail" value="" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Mô Tả Chi Tiết"></textarea>
                </div>
            </div>

            <div class="flex justify-center">
                <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                    Booking
                </button>
            </div>
        </form>
    </div>
@endsection
@section('scripts')
@endsection
