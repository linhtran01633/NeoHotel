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

    <div class="fixed z-50 bottom-0 booking-wrapper w-full bg-[#633511] backdrop-blur-lg ">
        <div class="h-5 sm:h-full flex max-w-[1080px] m-auto items-center justify-center gap-5 py-6 px-4">
            <div class="hidden sm:block w-full">
                <form class="w-full grid sm:grid-flow-col sm:grid-rows-1 gap-3">
                    <div class="flex-[1 1 340px] min-w-[195px]">
                        <div class="w-full border h-11  border-white  bg-[#633511] hover:bg-[#7E502C]">
                            <div class="ant-picker ant-picker-range ant-picker-borderless css-1gtsgz1 custom-range-picker flex-2 h-11 rounded-none w-full border text-white">
                                <div class="ant-picker-input ant-picker-input-active">
                                    <input readonly="" placeholder="Ngày nhận phòng" size="12" autocomplete="off" value="">
                                </div>
                                <div class="ant-picker-range-separator">
                                    <span aria-label="to" class="ant-picker-separator">
                                        <span role="img" aria-label="swap-right" class="anticon anticon-swap-right">
                                            <svg viewBox="0 0 1024 1024" focusable="false" data-icon="swap-right" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                                <path d="M873.1 596.2l-164-208A32 32 0 00684 376h-64.8c-6.7 0-10.4 7.7-6.3 13l144.3 183H152c-4.4 0-8 3.6-8 8v60c0 4.4 3.6 8 8 8h695.9c26.8 0 41.7-30.8 25.2-51.8z"></path>
                                            </svg>
                                        </span>
                                    </span>
                                </div>
                                <div class="ant-picker-input">
                                    <input readonly="" placeholder="Ngày trả phòng" size="12" autocomplete="off" value="">
                                </div>
                                <div class="ant-picker-active-bar" style="left: 0px; width: 150px; position: absolute;"></div>
                                <span class="ant-picker-suffix">
                                    <span role="img" aria-label="calendar" class="anticon anticon-calendar">
                                        <svg viewBox="64 64 896 896" focusable="false" data-icon="calendar" width="1em" height="1em" fill="currentColor" aria-hidden="true">
                                            <path d="M880 184H712v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H384v-64c0-4.4-3.6-8-8-8h-56c-4.4 0-8 3.6-8 8v64H144c-17.7 0-32 14.3-32 32v664c0 17.7 14.3 32 32 32h736c17.7 0 32-14.3 32-32V216c0-17.7-14.3-32-32-32zm-40 656H184V460h656v380zM184 392V256h128v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h256v48c0 4.4 3.6 8 8 8h56c4.4 0 8-3.6 8-8v-48h128v136H184z"></path>
                                        </svg>
                                    </span>
                                </span>
                            </div>
                        </div>
                    </div>
                        <div class="flex-[1 1 340px] min-w-[140px] relative">
                            <button type="button" class="flex !justify-start border font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]">
                                <p class="text-[#E6E6E6] text-base font-normal leading-tight">Khách hàng</p>
                            </button>
                            <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
                                <path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
                            </svg>
                    </div>
                    <div class="flex-[1 1 165px] min-w-[155px] relative ">
                        <button type="button" class="border flex !justify-start font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]">
                            <p class="text-[#E6E6E6] text-base font-normal leading-tight lantern-hotel-title">LANTERN HOTEL</p>
                        </button>
                        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
                            <path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
                        </svg>
                    </div>
                    <div class="flex-[1 1 155px] min-w-[100px]">
                        <button type="submit" class="rounded-none w-full h-11 bg-[#FFFF] hover:bg-[#DBB98E] text-yellow-900 text-base font-medium">{{__('button.booknow')}}</button>
                    </div>
                </form>
            </div>
            <div class="sm:hidden w-full">
                <div>
                    <button class="p-4 w-full">
                        <span class="text-white font-medium">Đặt phòng</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
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
