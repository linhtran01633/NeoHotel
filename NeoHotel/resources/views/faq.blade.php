@extends('app_layout')
@section('content')
    @include('header')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="flex flex-col gap-32px mb-32px  sm-gap-60px sm-mb-60px">
                <div class="relative h-200px w-full text-center bg-black bg-opacity-40">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images)) src="{{ asset('/storage/'.$banner_images) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="w-full absolute translate-x--50p translate-y--50p top-50p">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-28px md:text-4xl text-white text-center">{{__('screen.title.faq')}}</h1>
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
                    <div class="faq-container max-width-1080px m-auto flex flex-col sm:flex-row px-smClamp">
                        <div class="w-full flex flex-col"><div class="mb-smClamp">
                            <h2 class="whitespace-pre-line text-headerClamp text-1A1A1A">FAQ</h2>
                            <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                        </div>
                        <div class="faq-wrapper w-full">
                            <div class="w-full">
                                <div class=" w-full rounded-2xl">
                                    @foreach ($faq as $item)
                                        @php
                                            $language = 'en';
                                            if(__('lang') == 'JP') {
                                                $language = 'jp';
                                            } else if(__('lang') == 'VN') {
                                                $language = 'vn';
                                            }
                                        @endphp
                                        <div class="mt-2 border border-solid mb-6 pt-2 pb-2" x-data="{showQuestion : false}">
                                            <button x-on:click="showQuestion = !showQuestion" class="flex w-full justify-between rounded-lg bg-white-100 px-4 py-2 text-left text-18px font-semibold text-black focus:outline-none focus-visible:ring focus-text-633511" id="headlessui-disclosure-button-:r17:" type="button" aria-expanded="false" >
                                                <h5 class="whitespace-pre-line text-lg " :class="showQuestion ? 'text-633511' : 'text-4a4a4a' ">{{$item['question_'. $language]}}</h5>
                                                <div class="text-sm w-6">
                                                    <svg x-show="showQuestion == false" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                                                    </svg>
                                                    <svg x-show="showQuestion == true" gxmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
                                                    </svg>
                                                </div>
                                            </button>
                                            <p x-show="showQuestion" class="px-4 pb-2 whitespace-pre-line text-left text-4a4a4a">{{$item['answer_'. $language]}}</p>
                                        </div>
                                    @endforeach
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
