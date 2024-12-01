@extends('app_layout')
@section('content')
    @include('header')
    @php
        $language = 'en';
        if(__('lang') == 'JP') {
            $language = 'jp';
        } else if(__('lang') == 'VN') {
            $language = 'vn';
        }
    @endphp
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="flex flex-col gap-32px mb-32px sm-gap-60px sm-mb-60px">
                <div class="relative h-200px w-full text-center bg-black bg-opacity-40">

                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="hidden sm:block absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images)) src="{{ asset('/storage/'.$banner_images) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="block sm:hidden absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images_mobile)) src="{{ asset('/storage/'.$banner_images_mobile) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">

                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="w-full absolute translate-x--50p translate-y--50p top-50p">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-28px md:text-4xl text-white text-center">{{__('screen.title.services')}}</h1>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumbs_breadcrumbList___U1J7">
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB">{{__('screen.title.home')}}</button>
                                    </li>
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB" aria-current="page">{{__('screen.title.services')}}</button>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <div class="max-width-1080px m-auto px-smClamp">
                    <div class="flex flex-wrap gap-8 p-x-8">
                        <div class="contentWrapper-description flex-1 min-w-300px">
                            <div class="w-full flex flex-col">
                                <div class="mb-smClamp">
                                    <h2 class="whitespace-pre-line text-headerClamp lantern-hotel-title text-isLantern text-78350f">@if(isset($data)) {!! $data['title_'. $language] !!} @endif</h2>
                                    <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                                </div>
                                <div class="flex flex-col pr-0 sm-pr-24px">
                                    <h3 class="whitespace-pre-line w-full text-2xl mb-12px font-medium leading-normal">@if(isset($data)) {!! $data['title_sub_'. $language] !!}@endif</h3>
                                    <div class="flex-1 w-full   text-base font-light leading-tight">
                                        <p class="whitespace-pre-line text-left">@if(isset($data)) {!! $data['comment_'. $language] !!}@endif</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contentWrapper-img flex-1 ">
                            <div class="w-full w-320px sm-w-460px m-auto relative">
                                <div class="swiper swiper-initialized swiper-horizontal swiper-ios mb-3 absolute z-0 swiper-backface-hidden" id="slide_services">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        @foreach ($array_images as $value)
                                            <div class="swiper-slide overflow-hidden w-full sm-w-460px">
                                                <img src="{{ asset('/storage/'.$value) }}" loading="lazy" decoding="async" data-nimg="1" class="w-full min-w-300px h-full object-center object-cover aspect-3-2 transform transition-transform duration-300 hover:scale-110" style="color: transparent;">
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="swiper-pagination flex"></div>
                                <button type="button" id="button-next-slide_services" class="absolute top-50p disabled:bg-black/30 left-0 z-10 arrow-left arrow ml-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                        <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <button type="button" id="button-prev-slide_services" class="absolute top-50p disabled:bg-black/30 right-0 z-10 arrow-right arrow mr-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-5 sm:mt-0">
                    <div class="max-width-1080px m-auto flex flex-col sm:flex-row px-smClamp">
                        <div class="w-full grid grid-cols-1 sm:grid-cols-3">
                            @foreach ($array_service as $item)
                                <div class="flex flex-col pr-0 sm-pr-24px  sm:border-b sm-border-E6E6E6 pb-32px sm-py-40px">
                                    <div class="w-full mb-12px flex-col items-center justify-center">
                                        <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                            <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                        </svg>
                                    </div>
                                    <div class="w-full mb-12px">
                                        <h5 class="font-medium whitespace-pre-line">{!! $item['title_service_'. $language] !!}</h5>
                                    </div>
                                    <p class="flex-1 w-full text-base font-light leading-tight whitespace-pre-line text-justify">{!! $item['comment_service_'. $language] !!}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </main>
        @include('footer')
        @include('popup_booking')
    </section>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var array_images = @json($array_images);

            var thumbSlider = new Swiper('.thumb-slider', {
                spaceBetween: 10,
                slidesPerView: 'auto',
                freeMode: true,
                watchSlidesVisibility: true,
                watchSlidesProgress: true,
                slideToClickedSlide: true,
            });

            var slide_services = new Swiper('#slide_services', {
                loop: true, // Cho phép lặp lại các slide
                navigation: {
                    nextEl: '#button-next-slide_services',
                    prevEl: '#button-prev-slide_services',
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '" style="background-image:url(/storage/' + array_images[index] + ')"></span>';
                    },
                },
                autoplay: false,
            });
        });
    </script>
@endsection
