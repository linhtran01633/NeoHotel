@extends('app_layout')
@section('content')
    @include('header')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div>
                <div class="relative h-[200px] w-full text-center bg-black bg-opacity-40">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images)) src="{{ asset('/storage/'.$banner_images) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="absolute left-[50%] translate-x-[-50%] translate-y-[-50%] top-[50%]">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-[28px] md:text-4xl text-white text-center">{{__('screen.title.activities')}}</h1>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumbs_breadcrumbList___U1J7">
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB">{{__('screen.title.home')}}</button>
                                    </li>
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB" aria-current="page">{{__('screen.title.activities')}}</button>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="w-full py-xlClamp" x-data="{buttonActiviti: 0}">
                    <div class="faq-container max-w-[1080px] m-auto flex flex-col sm:flex-row px-smClamp">
                        <div class="w-full flex flex-col">
                            <div class="mb-smClamp">
                                <h2 class="whitespace-pre-line text-headerClamp ">{{__('screen.title.activities')}}</h2>
                                <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                            </div>
                            <div class="w-full flex-col px-2 sm:px-0">
                                <div class="w-full flex space-x-1 bg-[#222222] p-1 mb-8" role="tablist" aria-orientation="horizontal">
                                    <button class="flex-1 w-full py-2.5 text-sm font-medium leading-5 ring-white/60 ring-offset-2  focus:outline-none" :class="buttonActiviti == 0  ? 'bg-white shadow' : 'text-white hover:bg-white/[0.12] hover:text-white'"  x-on:click="buttonActiviti = 0">
                                        <div class="flex gap-1 sm:gap-4 items-center justify-center">
                                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_167_2718)">
                                                    <path d="M10.3347 3.26575C10.8002 3.05924 11.3279 2.9445 11.8491 2.9445C12.1507 2.9445 12.4392 2.98056 12.7112 3.0494C12.8194 3.07562 12.9243 2.98384 12.9079 2.87239L12.8686 2.5577C12.8358 2.03322 12.2359 1.61035 11.518 1.61035C10.7805 1.61035 10.0757 2.05288 10.0757 2.60031L10.1085 3.1248C10.1183 3.23953 10.2331 3.31164 10.3347 3.26575ZM16.4777 12.2836L16.4613 12.1885C16.4613 12.182 16.458 12.1754 16.458 12.1688L15.8516 9.08751C15.7729 8.37618 15.255 7.75663 14.501 7.37311L14.2126 5.13422C14.2126 4.18359 13.1374 3.4067 11.8491 3.4067C10.5609 3.4067 9.33488 4.17704 9.33488 5.13094C9.33488 5.17683 9.33816 5.226 9.34472 5.2719L9.36111 5.51447C9.10542 5.42268 8.81368 5.37024 8.50555 5.37024C8.19413 5.37024 7.90239 5.42268 7.64343 5.51775L7.65982 5.2719C7.66637 5.226 7.66965 5.18011 7.66965 5.13094C7.66965 4.18032 6.44039 3.4067 5.15541 3.4067C3.86715 3.4067 2.79196 4.18359 2.79196 5.13422L2.5035 7.37311C1.74955 7.75336 1.23163 8.37618 1.15295 9.08751L0.54652 12.1688C0.54652 12.1754 0.543242 12.182 0.543242 12.1885L0.526852 12.2836C0.51374 12.3819 0.503906 12.4803 0.503906 12.5819C0.503906 14.0439 2.03474 15.2305 3.9196 15.2305C5.80446 15.2305 7.33529 14.0439 7.33529 12.5819V11.369C7.67293 11.5264 8.07613 11.6149 8.50555 11.6149C8.93497 11.6149 9.33488 11.5264 9.67252 11.3723V12.5819C9.67252 14.0439 11.2034 15.2305 13.0882 15.2305C14.9698 15.2305 16.5039 14.0439 16.5039 12.5819C16.5006 12.4803 16.4908 12.3819 16.4777 12.2836ZM3.9196 14.2766C2.58545 14.2766 1.45781 13.4997 1.45781 12.5819C1.45781 11.6608 2.58545 10.8871 3.9196 10.8871C5.25375 10.8871 6.38139 11.664 6.38139 12.5819C6.38139 13.4997 5.25375 14.2766 3.9196 14.2766ZM8.50555 10.7757C7.945 10.7757 7.48936 10.4577 7.48936 10.0676C7.48936 9.67755 7.945 9.35958 8.50555 9.35958C9.06609 9.35958 9.52173 9.67755 9.52173 10.0676C9.52173 10.4577 9.06609 10.7757 8.50555 10.7757ZM13.0849 14.2766C11.7508 14.2766 10.6231 13.4997 10.6231 12.5819C10.6231 11.6608 11.7508 10.8871 13.0849 10.8871C14.4191 10.8871 15.5467 11.664 15.5467 12.5819C15.5467 13.4997 14.4191 14.2766 13.0849 14.2766ZM4.29002 3.0494C4.56209 2.98056 4.85383 2.9445 5.15213 2.9445C5.67334 2.9445 6.20438 3.05924 6.66658 3.26575C6.7682 3.31164 6.88293 3.23953 6.88948 3.12807L6.92226 2.60359C6.92226 2.05616 6.21749 1.61363 5.47994 1.61363C4.76205 1.61363 4.16545 2.03649 4.12939 2.56098L4.09006 2.87567C4.07694 2.98384 4.17856 3.0789 4.29002 3.0494Z" fill="black"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_167_2718">
                                                        <rect width="16" height="16" fill="black" transform="translate(0.503906 0.420898)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            {{__('activities.see')}}
                                        </div>
                                    </button>
                                    <button class="flex-1 w-full py-2.5 text-sm font-medium leading-5 ring-white/60 ring-offset-2  focus:outline-none" :class="buttonActiviti == 1 ? 'bg-white shadow' : 'text-white hover:bg-white/[0.12] hover:text-white'"  x-on:click="buttonActiviti = 1">
                                        <div class="flex gap-1 sm:gap-4 items-center justify-center">
                                            <svg width="16" height="17" viewBox="0 0 16 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_167_2723)">
                                                    <path d="M15.5868 13.9848L9.31294 7.71086L1.98294 0.380859H1.41009L1.29313 0.678078C0.984406 1.46258 0.8525 2.26495 0.911719 2.99836C0.979219 3.83436 1.29681 4.55814 1.83022 5.09155L7.55241 10.8137L8.30716 10.059L13.5973 15.9744C14.1236 16.5006 15.0293 16.5319 15.5868 15.9744C16.1354 15.4258 16.1354 14.5333 15.5868 13.9848ZM4.90078 9.48842L0.419187 13.97C-0.129313 14.5185 -0.129313 15.411 0.419187 15.9595C0.94025 16.4806 1.84166 16.5266 2.40872 15.9595L6.89034 11.4779L4.90078 9.48842ZM15.3234 3.04489L12.7812 5.58708L12.118 4.92389L14.6602 2.38167L13.997 1.71848L11.4548 4.26067L10.7917 3.59748L13.3339 1.0553L12.6707 0.392141L9.35478 3.70808C8.94942 4.11311 8.70671 4.65277 8.67266 5.2248C8.664 5.36983 8.63112 5.51248 8.57659 5.64817L10.7306 7.8022C10.8663 7.74761 11.009 7.71477 11.154 7.70611C11.726 7.67211 12.2657 7.42941 12.6707 7.02402L15.9867 3.70811L15.3234 3.04489Z" fill="white"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_167_2723">
                                                        <rect width="16" height="16" fill="black" transform="translate(0.00390625 0.380859)"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            {{__('activities.eat')}}
                                        </div>
                                    </button>
                                    <button class="flex-1 w-full py-2.5 text-sm font-medium leading-5 ring-white/60 ring-offset-2  focus:outline-none" :class="buttonActiviti == 2 ? 'bg-white shadow' : 'text-white hover:bg-white/[0.12] hover:text-white'"  x-on:click="buttonActiviti = 2">
                                        <div class="flex gap-1 sm:gap-4 items-center justify-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"></path>
                                            </svg>
                                            {{__('activities.buy')}}
                                        </div>
                                    </button>
                                </div>
                                <div>
                                    <div class="rounded-xl bg-white ring-white/60 ring-offset-2  focus:outline-none focus:ring-2" id="headlessui-tabs-panel-:r3:" role="tabpanel" tabindex="0" data-headlessui-state="selected" aria-labelledby="headlessui-tabs-tab-:r0:">
                                        <div x-show="buttonActiviti == 0" class="google-map-code w-full overflow-hidden">
                                            <iframe class="w-full h-[50vh] " src="https://www.google.com/maps/d/u/1/embed?mid=1gKW5_K6jrynKWHpsiMLGlcysJGzpQ48&amp;ehbc=2E312F&amp;noprof=1&amp;z=13&amp;ll=10.76956, 106.69214"></iframe>
                                        </div>

                                        <div x-show="buttonActiviti == 1" class="google-map-code w-full overflow-hidden">
                                            <iframe class="w-full h-[50vh] " src="https://www.google.com/maps/d/u/1/embed?mid=110ciQ5yp3C5izkriB1h8r8xK4CN56q0&amp;ehbc=2E312F&amp;noprof=1&amp;z=13&amp;ll=10.76956, 106.69214"></iframe>
                                        </div>

                                        <div x-show="buttonActiviti == 2" class="google-map-code w-full overflow-hidden">
                                            <iframe class="w-full h-[50vh]" src="https://www.google.com/maps/d/u/1/embed?mid=1hH2M84zsUC0O125BPOG07BPo0QWhLRM&amp;ehbc=2E312F&amp;noprof=1&amp;z=13&amp;ll=10.76956, 106.69214"></iframe>
                                        </div>
                                    </div>
                                    <span id="headlessui-tabs-panel-:r4:" role="tabpanel" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;" aria-labelledby="headlessui-tabs-tab-:r1:"></span>
                                    <span id="headlessui-tabs-panel-:r5:" role="tabpanel" tabindex="-1" style="position: fixed; top: 1px; left: 1px; width: 1px; height: 0px; padding: 0px; margin: -1px; overflow: hidden; clip: rect(0px, 0px, 0px, 0px); white-space: nowrap; border-width: 0px;" aria-labelledby="headlessui-tabs-tab-:r2:"></span>
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
