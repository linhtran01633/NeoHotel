<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lantern hotel - Vision</title>
    <!-- Ant Design CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
    <header class="h-[60px] sm:h-[84px] z-[2] bg-black text-gray-100">
        <div class="max-w-[1080px] h-[60px] sm:h-[84px] container flex justify-between mx-auto">
            <a aria-label="Back to homepage" class="flex items-center p-6" href="/">
                <div class="relative w-[50px] h-[50px] sm:w-[75px] sm:h-[75px]">
                    <img alt="neo-hotel-logo" src="/logo/logo.webp" loading="lazy" decoding="async" data-nimg="fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                </div>
            </a>
            <div class="items-center justify-end flex-shrink-0 hidden lg:flex lg:flex-1">
                <ul class="items-stretch hidden lg:flex">
                    <li>
                        <a class="flex text-white self-baseline h-full hover:text-customColor items-center mx-4 mb-1 @if($tab == 1)active border-customColor text-customColor border-b-2 @endif" href="/">{{ __('screen.title.home') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 2)active border-customColor text-customColor border-b-2 @endif" href="/about-us">{{ __('screen.title.aboutus') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 3)active border-customColor text-customColor border-b-2 @endif" href="/services">{{ __('screen.title.services') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 4)active border-customColor text-customColor border-b-2 @endif" href="/rooms">{{ __('screen.title.rooms') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 5)active border-customColor text-customColor border-b-2 @endif" href="/activities">{{ __('screen.title.activities') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 6)active border-customColor text-customColor border-b-2 @endif" href="/faq">{{ __('screen.title.faq') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 @if($tab == 7)active border-customColor text-customColor border-b-2 @endif" href="/contact">{{ __('screen.title.contact') }}</a>
                    </li>
                </ul>
            <div class="relative inline-block text-left" data-headlessui-state="" x-data="{ popup_local: false }">
                <button @click="popup_local = ! popup_local" class="items-center inline-flex w-[80px] justify-center rounded-md bg-black/20 px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75" id="headlessui-menu-button-:r5e:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                    <div class="w-5">
                        @if (__('lang') == 'VN')
                            <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-vn" viewBox="0 0 640 480">
                                <defs>
                                    <clipPath id="vn-a">
                                        <path fill-opacity=".7" d="M-85.3 0h682.6v512H-85.3z"></path>
                                    </clipPath>
                                </defs>
                                <g fill-rule="evenodd" clip-path="url(#vn-a)" transform="translate(80)scale(.9375)">
                                    <path fill="#da251d" d="M-128 0h768v512h-768z"></path>
                                    <path fill="#ff0" d="M349.6 381 260 314.3l-89 67.3L204 272l-89-67.7 110.1-1 34.2-109.4L294 203l110.1.1-88.5 68.4 33.9 109.6z"></path>
                                </g>
                            </svg>
                        @elseif (__('lang') == 'JP')
                            <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-jp" viewBox="0 0 640 480">
                                <defs>
                                    <clipPath id="jp-a">
                                        <path fill-opacity=".7" d="M-88 32h640v480H-88z"></path>
                                    </clipPath>
                                </defs>
                                <g fill-rule="evenodd" stroke-width="1pt" clip-path="url(#jp-a)" transform="translate(88 -32)">
                                    <path fill="#fff" d="M-128 32h720v480h-720z"></path>
                                    <circle cx="523.1" cy="344.1" r="194.9" fill="#bc002d" transform="translate(-168.4 8.6)scale(.76554)"></circle>
                                </g>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
                                <path fill="#012169" d="M0 0h640v480H0z"></path>
                                <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z"></path>
                                <path fill="#C8102E" d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z"></path>
                                <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z"></path>
                                <path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z"></path>
                            </svg>
                        @endif
                    </div>
                    <span class="ml-2 text-white self-center hover:text-[#DBB98E]">{{ __('lang') }}</span>
                </button>

                <div x-show="popup_local" class="absolute w-[140px] z-50 right-0 mt-2 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black/5 focus:outline-none hover:text-[#DBB98E] transform opacity-100 scale-100" aria-labelledby="headlessui-menu-button-:r5e:" id="headlessui-menu-items-:r5k:" role="menu" tabindex="0" data-headlessui-state="open">
                    <div class="px-1 py-1 " role="none">
                        <a class="text-gray-900 group flex w-full items-end rounded-md px-2 py-2 text-sm hover:bg-slate-100" id="headlessui-menu-item-:r5l:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ url('locale/en') }}">
                            <div class="w-4 h-4">
                                <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-gb" viewBox="0 0 640 480">
                                    <path fill="#012169" d="M0 0h640v480H0z"></path>
                                    <path fill="#FFF" d="m75 0 244 181L562 0h78v62L400 241l240 178v61h-80L320 301 81 480H0v-60l239-178L0 64V0z"></path>
                                    <path fill="#C8102E" d="m424 281 216 159v40L369 281zm-184 20 6 35L54 480H0zM640 0v3L391 191l2-44L590 0zM0 0l239 176h-60L0 42z"></path>
                                    <path fill="#FFF" d="M241 0v480h160V0zM0 160v160h640V160z"></path><path fill="#C8102E" d="M0 193v96h640v-96zM273 0v480h96V0z"></path>
                                </svg>
                            </div>
                            <div class="ml-2   text-base font-normal leading-tight">English</div>
                        </a>
                        <a class="text-gray-900 group flex w-full items-end rounded-md px-2 py-2 text-sm hover:bg-slate-100" id="headlessui-menu-item-:r5m:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ url('locale/ja') }}">
                            <div class="w-4 h-4">
                                <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-jp" viewBox="0 0 640 480">
                                    <defs>
                                        <clipPath id="jp-a">
                                            <path fill-opacity=".7" d="M-88 32h640v480H-88z"></path>
                                        </clipPath>
                                    </defs>
                                    <g fill-rule="evenodd" stroke-width="1pt" clip-path="url(#jp-a)" transform="translate(88 -32)">
                                        <path fill="#fff" d="M-128 32h720v480h-720z"></path>
                                        <circle cx="523.1" cy="344.1" r="194.9" fill="#bc002d" transform="translate(-168.4 8.6)scale(.76554)"></circle>
                                    </g>
                                </svg>
                            </div>
                            <div class="ml-2   text-base font-normal leading-tight">日本語</div>
                        </a>
                        <a class="text-gray-900 group flex w-full items-end rounded-md px-2 py-2 text-sm hover:bg-slate-100" id="headlessui-menu-item-:r5n:" role="menuitem" tabindex="-1" data-headlessui-state="" href="{{ url('locale/vn') }}">
                            <div class="w-4 h-4 ">
                                <svg xmlns="http://www.w3.org/2000/svg" id="flag-icons-vn" viewBox="0 0 640 480">
                                    <defs>
                                        <clipPath id="vn-a">
                                            <path fill-opacity=".7" d="M-85.3 0h682.6v512H-85.3z"></path>
                                        </clipPath>
                                    </defs>
                                    <g fill-rule="evenodd" clip-path="url(#vn-a)" transform="translate(80)scale(.9375)">
                                        <path fill="#da251d" d="M-128 0h768v512h-768z"></path>
                                        <path fill="#ff0" d="M349.6 381 260 314.3l-89 67.3L204 272l-89-67.7 110.1-1 34.2-109.4L294 203l110.1.1-88.5 68.4 33.9 109.6z"></path>
                                    </g>
                                </svg>
                            </div>
                            <div class="ml-2   text-base font-normal leading-tight">Tiếng Việt</div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    @yield('scripts')
    <script>
        $('#date-range-picker').daterangepicker({
                autoApply: true, // Tự động áp dụng ngày khi chọn xong
                format: 'dd/mm/yyyy', // Định dạng ngày (có thể thay đổi theo ý muốn)
                showOnFocus: true, // Hiển thị datepicker khi input được focus
                startDate: new Date(), // Ngày bắt đầu mặc định là ngày hiện tại
                minDate: new Date(), // Giới hạn ngày nhỏ nhất là ngày hiện tại
                opens: 'right',
                drops: 'up'
            });
    </script>
</body>
</html>