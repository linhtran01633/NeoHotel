@extends('app_layout')
@section('content')
    @include('header')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="flex flex-col gap-[32px] mb-[32px]  sm:gap-[60px] sm:mb-[60px]">
                <div class="relative h-[200px] w-full text-center bg-black bg-opacity-40">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="absolute object-cover w-full" sizes="100vw" src="/headerbanner.webp" style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute left-[50%] translate-x-[-50%] translate-y-[-50%] top-[50%]">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-[28px] md:text-4xl text-white text-center">{{__('screen.title.faq')}}</h1>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumbs_breadcrumbList___U1J7">
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB">{{__('screen.title.home')}}</button>
                                    </li>
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB" aria-current="page">{{__('screen.title.faq')}}</button>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="w-full py-xlClamp">
                    <div class="faq-container max-w-[1080px] m-auto flex flex-col sm:flex-row px-smClamp">
                        <div class="w-full flex flex-col"><div class="mb-smClamp">
                            <h2 class="whitespace-pre-line text-headerClamp ">FAQ</h2>
                            <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                        </div>
                        <div class="faq-wrapper w-full" x-data="{
                                showQuestion1: false,
                                showQuestion2: false,
                                showQuestion3: false,
                                showQuestion4: false,
                                showQuestion5: false,
                                showQuestion6: false,
                                showQuestion7: false,
                                showQuestion8: false,
                                showQuestion9: false,
                                showQuestion10: false,
                                showQuestion11: false,
                                showQuestion12: false,
                                showQuestion13: false,
                                showQuestion14: false,
                                showQuestion15: false,
                                showQuestion16: false,
                                showQuestion17: false,
                                showQuestion18: false,
                                showQuestion19: false,
                                showQuestion20: false,
                                showQuestion21: false,
                                showQuestion22: false,
                            }">
                            <div class="w-full">
                                <div class=" w-full rounded-2xl">
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2">
                                        <button x-on:click="showQuestion1 = !showQuestion1" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r17:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question1.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion1 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion1 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion1" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question1.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion2 = !showQuestion2" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r19:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question2.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion2 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion2 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion2" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question2.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion3 = !showQuestion3" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1b:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question3.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion3 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion3 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion3" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question3.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion4 = !showQuestion4" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1d:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question4.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion4 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion4 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion4" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question4.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion5 = !showQuestion5" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1f:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question5.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion5 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion5 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion5" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question5.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion6 = !showQuestion6" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1h:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question6.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion6 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion6 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion6" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question6.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion7 = !showQuestion7" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1j:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question7.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion7 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion7 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion7" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question7.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion8 = !showQuestion8" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1l:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question8.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion8 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion8 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion8" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question8.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion9 = !showQuestion9" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1n:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question9.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion9 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion9 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion9" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question9.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion10 = !showQuestion10" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1p:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question10.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion10 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion10 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion10" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question10.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion11 = !showQuestion11" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1r:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question11.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion11 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion11 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion11" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question11.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion12 = !showQuestion12" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1t:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question12.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion12 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion12 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion12" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question12.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion13 = !showQuestion13" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r1v:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question13.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion13 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion13 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion13" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question13.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion14 = !showQuestion14" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r21:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question14.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion14 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion14 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion14" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question14.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion15 = !showQuestion15" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r23:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question15.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion15 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion15 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion15" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question15.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion16 = !showQuestion16" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r25:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question16.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion16 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion16 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion16" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question16.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion17 = !showQuestion17" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r27:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question17.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion17 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion17 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion17" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question17.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion18 = !showQuestion18" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r29:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question18.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion18 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion18 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion18" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question18.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion19 = !showQuestion19" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r2b:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question19.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion19 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion19 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion19" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question19.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion20 = !showQuestion20" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r2d:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question20.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion20 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion20 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion20" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question20.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion21 = !showQuestion21" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r2f:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question21.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion21 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion21 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion21" class="px-4 pb-2 whitespace-pre-line text-left">{!!__('faq.question21.comment')!!}</p>
                                    </div>
                                    <div class="mt-2 border border-solid mb-6 pt-2 pb-2" >
                                        <button x-on:click="showQuestion22 = !showQuestion22" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-[18px] font-medium text-black focus:outline-none focus-visible:ring focus:text-[#633511]" id="headlessui-disclosure-button-:r2h:" type="button" aria-expanded="false" >
                                            <h5 class="text-lg">{{__('faq.question22.title')}}</h5>
                                            <div class="text-sm w-6">
                                                <svg x-show="showQuestion22 == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                </svg>
                                                <svg x-show="showQuestion22 == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                </svg>
                                            </div>
                                        </button>
                                        <p x-show="showQuestion22" class="px-4 pb-2 whitespace-pre-line text-left text-base">{!!__('faq.question22.comment')!!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </main>
    </section>
    @include('footer')
    @include('popup_booking')
@endsection
