@extends('app_layout')

@section('content')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="isolate slide-container relative flex-1">
                <div class="swiper swiper-container swiper-initialized swiper-horizontal swiper-backface-hidden" id="main">
                    <div class="swiper-wrapper" style="transition-duration: 2000ms; transform: translate3d(-4632px, 0px, 0px);">
                        <div class="swiper-slide swiper-slide-next" style="width: 1158px;" data-swiper-slide-index="0">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide one" src="/homeslide/homeslide1.jpg" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 1158px;" data-swiper-slide-index="1">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide one" src="/homeslide/homeslide2.jpg" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide" style="width: 1158px;" data-swiper-slide-index="2">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" src="/homeslide/homeslide3.jpg" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-prev" style="width: 1158px;" data-swiper-slide-index="3">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" src="/homeslide/homeslide4.jpg" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                            </div>
                        </div>
                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="4" style="width: 1158px;">
                            <div class="relative min-h-[calc(100vh-60px)] sm:min-h-[calc(100vh-92px-84px)]">
                                <img alt="Slide two" src="/homeslide/homeslide5.jpg" decoding="async" data-nimg="fill" class="thumbnail absolute object-left sm:object-center w-full object-fill" sizes="100vw" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
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
                                <h1 class="text-white font-normal uppercase leading-10 lantern-hotel-title text-[32px]">{{__('home.slider.title')}}</h1>
                            </div>
                        </div>
                        <button class="text-white text-base font-medium leading-tight">
                            <div class="w-40 hover:bg-black/30 p-3 border border-white justify-center items-center gap-2.5 inline-flex">{{__('home.slider.buttonText')}}
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                    <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                                </svg>
                            </div>
                        </button>
                    </div>
                </div>
                <div class="absolute right-0 top-[50%] z-[2]">
                    <button type="button" class="button-prev-slide disabled:bg-black/30 z-5 mr-2 arrow-left arrow ml-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                            <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <button type="button" class="button-next-slide  disabled:bg-black/30 z-5 arrow-right arrow mr-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                            <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </main>
    </section>
    @include('popup_booking')
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        var swiper = new Swiper('.swiper-container', {
            loop: true, // Cho phép lặp lại các slide
            navigation: {
            nextEl: '.button-next-slide',
            prevEl: '.button-prev-slide',
            },
            pagination: {
            el: '.swiper-pagination',
            clickable: true,
            },
            autoplay: {
            delay: 3000,
            disableOnInteraction: false,
            },
        });
        });
    </script>
@endsection
