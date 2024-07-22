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
            Create Service
        </button>
        <div x-show="created" class="container mx-auto p-4">
            <h2 class="text-2xl font-bold mb-4 text-center">Service Form</h2>
            <form  action="{{route('admin.service.save')}}" method="POST" class="max-w-2xl mx-auto" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" id="id_edit">
                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                    <div class="w-full">
                        <label for="service_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Service name</label>
                        <input type="text" name="service_name" id="service_name" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Service name" required="">
                    </div>

                    <div class="w-full">
                        <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Price</label>
                        <input type="text" name="price" id="price" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Price" required="">
                    </div>
                </div>

                <div class="flex justify-center">
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300">
                        Create Service
                    </button>
                </div>
            </form>
        </div>

        <div class="py-2">
            <table id="table" class="min-w-full border border-gray-300 table-auto">
                <thead>
                    <tr class="bg-sidebar">
                        <th class="w-1/6 py-2 px-4 border-b">STT</th>
                        <th class="w-3/6 py-2 px-4 border-b">Name</th>
                        <th class="w-2/6 py-2 px-4 border-b">Price</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var CallDataTableURL = '{!! route('admin.service') !!}';
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
                        data: "service_name",
                        defaultContent: "",
                    },
                    {
                        data: "price",
                        defaultContent: "",
                    },
                ],
            });
        });
    </script>
@endsection
