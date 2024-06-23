@extends('app_layout')
@section('content')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="flex flex-col gap-[32px] mb-[32px]  sm:gap-[60px] sm:mb-[60px]">
                <div class="relative h-[200px] w-full text-center bg-black bg-opacity-40">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="absolute object-cover w-full" sizes="100vw" src="/headerbanner.webp" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute left-[50%] translate-x-[-50%] translate-y-[-50%] top-[50%]">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-[28px] md:text-4xl text-white text-center">{{__('screen.title.services')}}</h1>
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

                <div class="max-w-[1080px] m-auto px-smClamp">
                    <div class="flex flex-wrap gap-8 p-x-8">
                        <div class="contentWrapper-description flex-1 min-w-[300px]">
                            <div class="w-full flex flex-col">
                                <div class="mb-smClamp">
                                    <h2 class="whitespace-pre-line text-headerClamp lantern-hotel-title text-isLantern">{{__('home.slider.title')}}</h2>
                                    <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                                </div>
                                <div class="flex flex-col pr-0 sm:pr-[24px]">
                                    <h3 class="w-full text-2xl mb-[12px] font-medium leading-normal">{{__('screen.title.services')}}</h3>
                                    <div class="flex-1 w-full   text-base font-light leading-tight">
                                        <p class="whitespace-pre-line text-left">{!!__('services.contents')!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="contentWrapper-img flex-1 ">
                            <div class="relative w-[320px] sm:w-[460px] m-auto">
                                <div class="swiper swiper-initialized swiper-horizontal swiper-ios mb-3 absolute z-0 swiper-backface-hidden">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide overflow-hidden swiper-slide-active" style="width: 460px;" data-swiper-slide-index="0">
                                            <img alt="service provider" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-[300px] h-full object-center object-cover aspect-[3/2] transform transition-transform duration-300 hover:scale-110" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=640&amp;q=100 1x, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=1200&amp;q=100 2x" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=1200&amp;q=100" style="color: transparent;">
                                        </div>
                                        <div class="swiper-slide overflow-hidden swiper-slide-next" style="width: 460px;" data-swiper-slide-index="1">
                                            <img alt="service provider" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-[300px] h-full object-center object-cover aspect-[3/2] transform transition-transform duration-300 hover:scale-110" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=640&amp;q=100 1x, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=1200&amp;q=100 2x" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=1200&amp;q=100" style="color: transparent;">
                                        </div>
                                        <div class="swiper-slide overflow-hidden" style="width: 460px;" data-swiper-slide-index="2">
                                            <img alt="service provider" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-[300px] h-full object-center object-cover aspect-[3/2] transform transition-transform duration-300 hover:scale-110" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=640&amp;q=100 1x, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=1200&amp;q=100 2x" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=1200&amp;q=100" style="color: transparent;">
                                        </div>
                                        <div class="swiper-slide overflow-hidden" data-swiper-slide-index="3" style="width: 460px;">
                                            <img alt="service provider" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-[300px] h-full object-center object-cover aspect-[3/2] transform transition-transform duration-300 hover:scale-110" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=640&amp;q=100 1x, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=1200&amp;q=100 2x" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=1200&amp;q=100" style="color: transparent;">
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper swiper-initialized swiper-horizontal swiper-ios swiper-backface-hidden swiper-thumbs">
                                    <div class="swiper-wrapper" style="transform: translate3d(0px, 0px, 0px);">
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active swiper-slide-thumb-active" style="width: 109px; margin-right: 8px;">
                                            <div class="h-[50px] sm:h-[102px] w-[131px]">
                                                <img alt="service provider" loading="lazy" decoding="async" data-nimg="fill" class="w-full min-w-[100] h-full object-center object-cover aspect-[3/2]" sizes="10vw" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=64&amp;q=100 64w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=96&amp;q=100 96w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=128&amp;q=100 128w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=256&amp;q=100 256w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=384&amp;q=100 384w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt1.webp&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-next" style="width: 109px; margin-right: 8px;">
                                            <div class="h-[50px] sm:h-[102px] w-[131px]">
                                                <img alt="service provider" loading="lazy" decoding="async" data-nimg="fill" class="w-full min-w-[100] h-full object-center object-cover aspect-[3/2]" sizes="10vw" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=64&amp;q=100 64w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=96&amp;q=100 96w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=128&amp;q=100 128w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=256&amp;q=100 256w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=384&amp;q=100 384w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt2.webp&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible" style="width: 109px; margin-right: 8px;">
                                            <div class="h-[50px] sm:h-[102px] w-[131px]">
                                                <img alt="service provider" loading="lazy" decoding="async" data-nimg="fill" class="w-full min-w-[100] h-full object-center object-cover aspect-[3/2]" sizes="10vw" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=64&amp;q=100 64w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=96&amp;q=100 96w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=128&amp;q=100 128w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=256&amp;q=100 256w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=384&amp;q=100 384w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt3.webp&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible" style="width: 109px; margin-right: 8px;">
                                            <div class="h-[50px] sm:h-[102px] w-[131px]">
                                                <img alt="service provider" loading="lazy" decoding="async" data-nimg="fill" class="w-full min-w-[100] h-full object-center object-cover aspect-[3/2]" sizes="10vw" srcset="/_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=64&amp;q=100 64w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=96&amp;q=100 96w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=128&amp;q=100 128w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=256&amp;q=100 256w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=384&amp;q=100 384w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=640&amp;q=100 640w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=750&amp;q=100 750w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=828&amp;q=100 828w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=1080&amp;q=100 1080w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=1200&amp;q=100 1200w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=1920&amp;q=100 1920w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=2048&amp;q=100 2048w, /_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=3840&amp;q=100 3840w" src="/_next/image?url=%2Fserviceslide%2Fserviceslideopt4.webp&amp;w=3840&amp;q=100" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="absolute top-[50%] disabled:bg-black/30 left-0 z-10 arrow-left arrow ml-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                        <path fill-rule="evenodd" d="M18 10a.75.75 0 01-.75.75H4.66l2.1 1.95a.75.75 0 11-1.02 1.1l-3.5-3.25a.75.75 0 010-1.1l3.5-3.25a.75.75 0 111.02 1.1l-2.1 1.95h12.59A.75.75 0 0118 10z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                                <button type="button" class="absolute top-[50%] disabled:bg-black/30 right-0 z-10 arrow-right arrow mr-2 bg-black px-2 py-2 text-sm font-medium text-white hover:bg-black/30 focus:outline-none focus-visible:ring-2 focus-visible:ring-white/75">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" width="20">
                                        <path fill-rule="evenodd" d="M2 10a.75.75 0 01.75-.75h12.59l-2.1-1.95a.75.75 0 111.02-1.1l3.5 3.25a.75.75 0 010 1.1l-3.5 3.25a.75.75 0 11-1.02-1.1l2.1-1.95H2.75A.75.75 0 012 10z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full mt-5 sm:mt-0">
                    <div class="max-w-[1080px] m-auto flex flex-col sm:flex-row px-smClamp">
                        <div class="grid grid-cols-1 grid-rows-[9] sm:grid-rows-2 sm:grid-cols-3">
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Vị trí</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Gần chợ Bến Thành (cách 8 phút đi bộ), tiện lợi cho di chuyển và khám phá</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Loại phòng</h5>
                                </div><p class="flex-1 w-full text-base font-light leading-tight whitespace-pre-line text-justify">Đa dạng phù hợp với từng đối tượng khách (Economy, Standard, Deluxe và Executive)</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Thiết bị</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Cần dùng đầy đủ cho khách du lịch</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Thức uống</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Miễn phí đặc biệt theo mùa từ 6:00 đến 23:00 hàng ngày</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Bữa sáng</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Phục vụ tận phòng theo phong cách địa phương, với menu thay đổi mỗi 3~4 ngày</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]  sm:border-b sm:border-[#E6E6E6]-800 pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Dịch vụ</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Tư vấn, và tổ chức tham quan theo yêu cầu (nửa ngày, một ngày, 1~3 đêm), liên hệ trước và sau khi đặt phòng</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]   pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Nhân viên</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Tận tình, am hiểu địa phương, có khả năng ngoại ngữ</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]   pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">Thông tin</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Bản đồ thông tin du lịch độc đáo, tin cậy, cập nhật</p>
                            </div>
                            <div class="flex flex-col pr-0 sm:pr-[24px]   pb-[32px] sm:py-[40px]">
                                <div class="w-full mb-[12px] flex-col items-center justify-center">
                                    <svg width="33" height="32" viewBox="0 0 33 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.0948 12.6129C21.148 12.6595 21.1914 12.7161 21.2225 12.7796C21.2536 12.8431 21.2717 12.9122 21.2759 12.9827C21.28 13.0533 21.2701 13.124 21.2467 13.1907C21.2233 13.2574 21.1869 13.3188 21.1396 13.3713L15.5321 19.5948C15.4846 19.6475 15.427 19.6902 15.3627 19.7203C15.2984 19.7505 15.2288 19.7675 15.1578 19.7703C15.0869 19.7732 15.0161 19.7619 14.9496 19.7371C14.8831 19.7122 14.8222 19.6744 14.7705 19.6257L11.5257 16.5713C11.4284 16.4784 11.3694 16.3523 11.3605 16.218C11.3517 16.0837 11.3935 15.9509 11.4777 15.846C11.5232 15.7891 11.5798 15.742 11.644 15.7076C11.7082 15.6732 11.7787 15.6523 11.8513 15.646C11.9239 15.6397 11.997 15.6482 12.0662 15.6711C12.1353 15.6939 12.1991 15.7305 12.2537 15.7788L14.7711 18.0433C14.8762 18.1379 15.0145 18.1869 15.1558 18.1795C15.297 18.1721 15.4295 18.1089 15.5241 18.0038L20.3471 12.6561C20.4409 12.552 20.572 12.4891 20.712 12.4809C20.8519 12.4727 20.9894 12.5199 21.0948 12.6124V12.6129Z" fill="#633511"></path>
                                        <circle cx="16.5" cy="16" r="15.5" stroke="#633511"></circle>
                                    </svg>
                                </div>
                                <div class="w-full mb-[12px]">
                                    <h5 class="font-medium">3G sim</h5>
                                </div>
                                <p class="flex-1 w-full   text-base font-light leading-tight whitespace-pre-line text-justify">Miễn phí 3G, wifi</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </section>
@endsection
