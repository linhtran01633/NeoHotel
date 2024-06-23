<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
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
                        <a class="flex text-white self-baseline h-full active border-customColor text-customColor border-b-2 hover:text-customColor items-center mx-4 mb-1 " href="/">{{ __('home') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/about-us">{{ __('aboutus') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/services">{{ __('services') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/rooms">{{ __('rooms') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/activities">{{ __('activities') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/faq">{{ __('contact') }}</a>
                    </li>
                    <li>
                        <a class="flex text-white self-baseline h-full  hover:text-customColor items-center mx-4 mb-1 " href="/contact">{{ __('faq') }}</a>
                    </li>
                </ul>
            <div class="relative inline-block text-left" data-headlessui-state="" x-data="{ popup_local: false }">
                <button @click="popup_local = ! popup_local" class="items-center inline-flex w-[80px] justify-center rounded-md bg-black/20 px-4 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75" id="headlessui-menu-button-:r5e:" type="button" aria-haspopup="menu" aria-expanded="false" data-headlessui-state="">
                    <div class="w-5">
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
                    <span class="ml-2 text-white self-center hover:text-[#DBB98E]">VN</span>
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


    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="isolate slide-container relative flex-1">
                <div class="swiper swiper-initialized swiper-horizontal swiper-backface-hidden" id="main">
                    <div class="swiper-wrapper" style="transition-duration: 2000ms; transform: translate3d(-4632px, 0px, 0px);">
                        <div class="swiper-slide swiper-slide-next" style="width: 1158px;" data-swiper-slide-index="0">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide one" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" srcset="/_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fhomeslide%2Fhomeslide1.jpg&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 1158px;" data-swiper-slide-index="1">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide one" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" srcset="/_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fhomeslide%2Fhomeslide2.jpg&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 1158px;" data-swiper-slide-index="2">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" srcset="/_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fhomeslide%2Fhomeslide3.jpg&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-prev" style="width: 1158px;" data-swiper-slide-index="3">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" srcset="/_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fhomeslide%2Fhomeslide4.jpg&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="4" style="width: 1158px;">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" srcset="/_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fhomeslide%2Fhomeslide5.jpg&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-6 absolute z-[2] sm:flex top-0 h-full w-[70%] md:w-[40%] md:bg-stone-950 md:bg-opacity-80 md:backdrop-blur-[20px] flex items-center justify-center">
                    <div class="w-72 flex-col justify-start items-start inline-flex md:gap-7">
                        <div class="pb-6 self-stretch h-44 flex-col justify-start items-start gap-3 flex flex-1">
                            <div class="flex-col justify-start items-start gap-4 flex">
                                <div class="justify-start items-start gap-1 inline-flex">
                                    <div class="star-wrapper flex gap-1">
                                        <svg width="16" height="16" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61958 1.17082C4.73932 0.802296 5.26068 0.802296 5.38042 1.17082L6.25728 3.8695C6.31083 4.03431 6.46441 4.1459 6.6377 4.1459H9.47526C9.86275 4.1459 10.0239 4.64174 9.71038 4.8695L7.41474 6.53738C7.27455 6.63924 7.21588 6.81979 7.26943 6.9846L8.14629 9.68328C8.26603 10.0518 7.84424 10.3583 7.53075 10.1305L5.23511 8.46262C5.09492 8.36076 4.90508 8.36076 4.76489 8.46262L2.46925 10.1305C2.15576 10.3583 1.73397 10.0518 1.85371 9.68328L2.73057 6.9846C2.78412 6.81979 2.72545 6.63924 2.58526 6.53738L0.289621 4.8695C-0.0238649 4.64174 0.137245 4.1459 0.524734 4.1459H3.3623C3.53559 4.1459 3.68917 4.03431 3.74272 3.8695L4.61958 1.17082Z" fill="#DBB98E"></path>
                                        </svg>
                                        <svg width="16" height="16" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61958 1.17082C4.73932 0.802296 5.26068 0.802296 5.38042 1.17082L6.25728 3.8695C6.31083 4.03431 6.46441 4.1459 6.6377 4.1459H9.47526C9.86275 4.1459 10.0239 4.64174 9.71038 4.8695L7.41474 6.53738C7.27455 6.63924 7.21588 6.81979 7.26943 6.9846L8.14629 9.68328C8.26603 10.0518 7.84424 10.3583 7.53075 10.1305L5.23511 8.46262C5.09492 8.36076 4.90508 8.36076 4.76489 8.46262L2.46925 10.1305C2.15576 10.3583 1.73397 10.0518 1.85371 9.68328L2.73057 6.9846C2.78412 6.81979 2.72545 6.63924 2.58526 6.53738L0.289621 4.8695C-0.0238649 4.64174 0.137245 4.1459 0.524734 4.1459H3.3623C3.53559 4.1459 3.68917 4.03431 3.74272 3.8695L4.61958 1.17082Z" fill="#DBB98E"></path>
                                        </svg>
                                        <svg width="16" height="16" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61958 1.17082C4.73932 0.802296 5.26068 0.802296 5.38042 1.17082L6.25728 3.8695C6.31083 4.03431 6.46441 4.1459 6.6377 4.1459H9.47526C9.86275 4.1459 10.0239 4.64174 9.71038 4.8695L7.41474 6.53738C7.27455 6.63924 7.21588 6.81979 7.26943 6.9846L8.14629 9.68328C8.26603 10.0518 7.84424 10.3583 7.53075 10.1305L5.23511 8.46262C5.09492 8.36076 4.90508 8.36076 4.76489 8.46262L2.46925 10.1305C2.15576 10.3583 1.73397 10.0518 1.85371 9.68328L2.73057 6.9846C2.78412 6.81979 2.72545 6.63924 2.58526 6.53738L0.289621 4.8695C-0.0238649 4.64174 0.137245 4.1459 0.524734 4.1459H3.3623C3.53559 4.1459 3.68917 4.03431 3.74272 3.8695L4.61958 1.17082Z" fill="#DBB98E"></path>
                                        </svg>
                                        <svg width="16" height="16" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61958 1.17082C4.73932 0.802296 5.26068 0.802296 5.38042 1.17082L6.25728 3.8695C6.31083 4.03431 6.46441 4.1459 6.6377 4.1459H9.47526C9.86275 4.1459 10.0239 4.64174 9.71038 4.8695L7.41474 6.53738C7.27455 6.63924 7.21588 6.81979 7.26943 6.9846L8.14629 9.68328C8.26603 10.0518 7.84424 10.3583 7.53075 10.1305L5.23511 8.46262C5.09492 8.36076 4.90508 8.36076 4.76489 8.46262L2.46925 10.1305C2.15576 10.3583 1.73397 10.0518 1.85371 9.68328L2.73057 6.9846C2.78412 6.81979 2.72545 6.63924 2.58526 6.53738L0.289621 4.8695C-0.0238649 4.64174 0.137245 4.1459 0.524734 4.1459H3.3623C3.53559 4.1459 3.68917 4.03431 3.74272 3.8695L4.61958 1.17082Z" fill="#DBB98E"></path>
                                        </svg>
                                        <svg width="16" height="16" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M4.61958 1.17082C4.73932 0.802296 5.26068 0.802296 5.38042 1.17082L6.25728 3.8695C6.31083 4.03431 6.46441 4.1459 6.6377 4.1459H9.47526C9.86275 4.1459 10.0239 4.64174 9.71038 4.8695L7.41474 6.53738C7.27455 6.63924 7.21588 6.81979 7.26943 6.9846L8.14629 9.68328C8.26603 10.0518 7.84424 10.3583 7.53075 10.1305L5.23511 8.46262C5.09492 8.36076 4.90508 8.36076 4.76489 8.46262L2.46925 10.1305C2.15576 10.3583 1.73397 10.0518 1.85371 9.68328L2.73057 6.9846C2.78412 6.81979 2.72545 6.63924 2.58526 6.53738L0.289621 4.8695C-0.0238649 4.64174 0.137245 4.1459 0.524734 4.1459H3.3623C3.53559 4.1459 3.68917 4.03431 3.74272 3.8695L4.61958 1.17082Z" fill="#DBB98E"></path>
                                        </svg>
                                    </div>
                                </div>
                                <div class="text-white text-base font-normal uppercase leading-tight">Bữa sáng phục vụ tận phòng</div>
                                <h1 class="text-white font-normal uppercase leading-10 lantern-hotel-title text-[32px]">LANTERN HOTEL</h1>
                            </div>
                        </div>
                        <button class="text-white text-base font-medium leading-tight">
                            <div class="w-40 hover:bg-black/30 p-3 border border-white justify-center items-center gap-2.5 inline-flex">Xem ngay
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                    <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="absolute right-0 top-[50%] z-[2]">
                    <button type="button" class="disabled:bg-black/30 z-5 mr-2 arrow-left arrow ml-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                            <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button type="button" class="disabled:bg-black/30 z-5 arrow-right arrow mr-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                            <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </main>
    </section>
</body>
</html>
