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
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" />

</head>
<body class="bg-gray-100 font-family-karla flex">

    <aside class="fixed bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">
                ADMIN
            </a>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('dashboard')}}" class="@if(isset($page_current) && $page_current == 'home') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                </svg>
                Dashboard
            </a>
            <a href="{{route('admin.booking')}}" class="@if(isset($page_current) && $page_current == 'category_parent') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                Bookings
            </a>

            <a href="{{route('admin.room')}}" class="@if(isset($page_current) && $page_current == 'category') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M21 7l-6 6 6 6" />
                </svg>
                Rooms
            </a>

            <a href="{{route('admin.customer')}}" class="@if(isset($page_current) && $page_current == 'product') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.944 13.944 0 0112 15c2.761 0 5.278.894 7.121 2.404M12 7a4 4 0 110-8 4 4 0 010 8zm0 8a9 9 0 110 18 9 9 0 010-18z" />
                </svg>
                Customers
            </a>

            <a href="#" class="@if(isset($page_current) && $page_current == 'news') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                </svg>
                Reports
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
                    <a href="#" class="@if(isset($page_current) && $page_current == 'home') active-nav-link @endif flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="#" class="@if(isset($page_current) && $page_current == 'category') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5h6M9 12h6m-7 7h8a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        Bookings
                    </a>

                    <a href="#" class="@if(isset($page_current) && $page_current == 'product') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7l6 6-6 6M21 7l-6 6 6 6" />
                        </svg>
                        Rooms
                    </a>

                    <a href="#" class="@if(isset($page_current) && $page_current == 'news') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.944 13.944 0 0112 15c2.761 0 5.278.894 7.121 2.404M12 7a4 4 0 110-8 4 4 0 010 8zm0 8a9 9 0 110 18 9 9 0 010-18z" />
                        </svg>
                        Customers
                    </a>

                    <a href="#" class="@if(isset($page_current) && $page_current == 'invoice') active-nav-link @endif flex items-center text-white py-4 pl-4 nav-item">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                        Reports
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
