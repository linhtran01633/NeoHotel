<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <!-- Tailwind -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        .font-family-karla { font-family: karla; }
        .bg-sidebar { background: #3d68ff; }
        .cta-btn { color: #3d68ff; }
        .upgrade-btn { background: #1947ee; }
        .upgrade-btn:hover { background: #0038fd; }
        .active-nav-link { background: #1947ee; }
        .nav-item:hover { background: #1947ee; }
        .account-link:hover { background: #3d68ff; }

        /* Tùy chỉnh tiêu đề cột */
        table.dataTable thead th {
            background-color: #3d68ff; /* Màu nền của tiêu đề */
            color: #fff; /* Màu chữ */
            font-weight: bold;
        }

        /* Tùy chỉnh hàng dữ liệu */
        table.dataTable tbody tr {
            border-bottom: 1px solid #ddd;
        }

        /* Tùy chỉnh hàng khi hover */
        table.dataTable tbody tr:hover {
            background-color: #f0f0f0;
        }

        /* Tùy chỉnh các nút phân trang */
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            padding: 0.5rem 1rem;
            margin: 0.25rem;
            border: 1px solid #ccc;
            border-radius: 0.25rem;
            background: #f9fafb;
            color: #374151;
        }

        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            background: #e5e7eb;
            border-color: #d1d5db;
        }

        .custom-grid {
            grid-template-columns: 30fr 10fr 30fr 30fr;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.11.1/dist/cdn.min.js"></script>

</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="fixed bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                ADMIN
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('admin.home_slide')}}" class="@if(isset($page_current) && $page_current == 'home_slide') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Home Slide
            </a>

            <a href="{{route('admin.about_us')}}" class="@if(isset($page_current) && $page_current == 'about_us') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                About us
            </a>

            <a href="{{route('admin.service')}}" class="@if(isset($page_current) && $page_current == 'service') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Service
            </a>

            <a href="{{route('admin.faq')}}" class="@if(isset($page_current) && $page_current == 'faq') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Faq
            </a>

            <a href="{{route('admin.category_room')}}" class="@if(isset($page_current) && $page_current == 'category_room') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                </svg>
                Category Room
            </a>

            <a href="{{route('admin.room')}}" class="@if(isset($page_current) && $page_current == 'rooms') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                </svg>
                Room
            </a>

            <a href="{{route('admin.contract')}}" class="@if(isset($page_current) && $page_current == 'contract') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                </svg>
                Contract
            </a>

            <a href="{{route('admin.banner')}}" class="@if(isset($page_current) && $page_current == 'banner') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                </svg>
                Banner
            </a>
        </nav>
    </aside>
    {{-- overflow-y-hidden --}}
    <div class="sm:pl-64 w-full">
        <div class="relative w-full flex flex-col h-screen">
            <!-- Desktop Header -->
            <header class="w-full items-center bg-white py-2 px-6 hidden sm:flex">
                <div class="w-1/2"></div>
                <div class="relative w-1/2 flex justify-end">
                    <button class="show_button_logout realtive z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-gray-400 hover:border-gray-300 focus:border-gray-300 focus:outline-none">
                        <i class="fas fa-user"></i>
                    </button>
                    <button class="div_show_logout h-full hidden w-full fixed inset-0 cursor-default"></button>
                    <div class="div_show_logout hidden absolute w-32 bg-white rounded-lg shadow-lg py-2 mt-16">
                        <form action="#" method="post">
                            @csrf
                            <button type="submit" class="w-11/12 mx-auto rounded-lg block px-4 py-2 account-link hover:text-white">Đăng xuất</button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Mobile Header & Nav -->
            <header class="w-full bg-sidebar py-5 px-6 sm:hidden">
                <div class="flex items-center justify-between">
                    <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                       ADMIN
                    </a>
                    <button class="text-white text-3xl focus:outline-none show_button_menu">
                        <i class="div_show_menu fas fa-bars"></i>
                        <i class="div_off_menu hidden fas fa-times"></i>
                    </button>
                </div>

                <!-- Dropdown Nav -->
                <nav class="show_menu_admin hidden flex flex-col pt-4">
                    <a href="{{route('admin.home_slide')}}" class="@if(isset($page_current) && $page_current == 'home_slide') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Home Slide
                    </a>

                    <a href="{{route('admin.about_us')}}" class="@if(isset($page_current) && $page_current == 'about_us') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        About us
                    </a>

                    <a href="{{route('admin.service')}}" class="@if(isset($page_current) && $page_current == 'service') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Service
                    </a>


                    <a href="{{route('admin.faq')}}" class="@if(isset($page_current) && $page_current == 'faq') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Faq
                    </a>

                    <a href="{{route('admin.category_room')}}" class="@if(isset($page_current) && $page_current == 'category_room') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                        Category Room
                    </a>

                    <a href="{{route('admin.room')}}" class="@if(isset($page_current) && $page_current == 'rooms') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                        Room
                    </a>

                    <a href="{{route('admin.contract')}}" class="@if(isset($page_current) && $page_current == 'contract') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                        Contract
                    </a>

                    <a href="{{route('admin.banner')}}" class="@if(isset($page_current) && $page_current == 'banner') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                        Banner
                    </a>

                    <form action="#" method="post">
                        @csrf
                        <button type="submit" class="w-11/12 mx-auto rounded-lg block px-4 py-2 account-link hover:text-white">Logout</button>
                    </form>
                </nav>
            </header>

            <div class="w-full px-4 py-2">
                @yield('content')
            </div>
        </div>
    </div>

    @yield('scripts')

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>


        @if (Session::has('message'))
            <input type="hidden" id="message_input" value="{{ Session::get('message') }}">

            <script>
                let text = $('#message_input').val();
                let divThongBao = document.createElement('div');
                divThongBao.textContent = text;
                divThongBao.style.padding = '50px';
                divThongBao.style.position = 'fixed';
                divThongBao.style.backgroundColor = 'royalblue';
                divThongBao.style.top = '30vh';
                divThongBao.style.left = 'calc(50% - 200px)';
                divThongBao.style.zIndex = '9999';
                divThongBao.style.width = '400px';
                divThongBao.style.textAlign = 'center';
                divThongBao.style.borderRadius = '1rem';
                divThongBao.style.color = 'white';

                document.body.appendChild(divThongBao);

                setTimeout(function() {
                    // Ẩn hoặc xóa thông báo sau 3 giây
                    document.body.removeChild(divThongBao)
                }, 1000);
            </script>

            @php
                Session::forget('message');
            @endphp
        @endif

    <script>

        $('.show_button_logout').on('click', function(e){
            if ($('.div_show_logout').hasClass("hidden")) {
                $('.div_show_logout').removeClass('hidden');
            } else {
                $('.div_show_logout').addClass('hidden');
            }
        })

        $('.show_button_menu').on('click', function(e){
            if ($('.div_off_menu').hasClass("hidden")) {
                $('.div_show_menu').addClass('hidden');
                $('.div_off_menu').removeClass('hidden');
                $('.show_menu_admin').removeClass('hidden');
            } else {
                $('.div_show_menu').removeClass('hidden');
                $('.div_off_menu').addClass('hidden');
                $('.show_menu_admin').addClass('hidden');
            }
        })
    </script>
</body>
</html>
