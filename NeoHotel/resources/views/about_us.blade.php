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
            <div class="flex flex-col gap-32px mb-32px  sm-gap-60px sm-mb-60px">
                <div class="relative h-200px w-full text-center bg-black bg-opacity-40">

                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="hidden sm:block absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images)) src="{{ asset('/storage/'.$banner_images) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">
                    <img alt="header banner" loading="lazy" decoding="async" data-nimg="fill" class="block sm:hidden absolute object-cover w-full" sizes="100vw"  @if(isset($banner_images_mobile)) src="{{ asset('/storage/'.$banner_images_mobile) }}" @else src="" @endif style="position: absolute; height: 100%; width: 100%; inset: 0px; color: transparent;">

                    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
                    <div class="w-full absolute translate-x--50p translate-y--50p top-50p">
                        <div class="flex flex-col gap-2">
                            <h1 class="text-28px md:text-4xl text-white text-center">{{__('screen.title.aboutus')}}</h1>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumbs_breadcrumbList___U1J7">
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB">{{__('screen.title.home')}}</button>
                                    </li>
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB" aria-current="page">{{__('screen.title.aboutus')}}</button>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="max-width-1080px m-auto px-smClamp">
                        <div class="flex flex-wrap gap-8 p-x-8">
                            <div class="contentWrapper-description flex-1 min-w-300px">
                                <div class="w-full flex flex-col">
                                    <div class="mb-smClamp">
                                        <h2 class="whitespace-pre-line text-3xl">@if(isset($aboutUs)) {!! $aboutUs['title1_'. $language] !!}@endif</h2>
                                        <div class="mb-10px">@if(isset($aboutUs)) {!! $aboutUs['title1_sub1_'. $language] !!}@endif</div>
                                        <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                                    </div>
                                    <p class="whitespace-pre-line mb-5 font-medium text-1A1A1A">@if(isset($aboutUs)) {!! $aboutUs['title1_sub2_'. $language] !!}@endif</p>
                                    <div class="flex flex-col gap-6">
                                        <div class="flex pr-0 gap-x-4 sm-pr-24px items-center">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.4507 6.84508C11.4507 6.56279 11.2123 6.33398 10.9182 6.33398H2.3996C2.10556 6.33398 1.86719 6.56279 1.86719 6.84508V23.2009C1.86719 23.4831 2.10556 23.712 2.3996 23.712H11.4507V6.84508Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M2.93359 6.3333V3.77772C2.93359 3.49544 3.17197 3.2666 3.46601 3.2666H9.85501C10.149 3.2666 10.3874 3.49544 10.3874 3.77772V6.3333" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M26.36 23.2011C26.36 23.4833 26.1217 23.7122 25.8276 23.7122H18.9062V9.91202C18.9062 9.62973 19.1446 9.40088 19.4387 9.40088H25.8276C26.1217 9.40088 26.36 9.62973 26.36 9.91202V23.2011Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M19.9688 9.40042V7.8671C19.9688 7.58481 20.2071 7.35596 20.5012 7.35596H24.7605C25.0545 7.35596 25.2929 7.58481 25.2929 7.8671V9.40042" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M11.4492 12.4668H18.903" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M11.4492 23.7109H18.903" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M3.99609 9.40088H9.32026" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M21.0352 12.4668H24.2296" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M3.99609 14H9.32026" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M21.0352 16.625H24.2296" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M7.18823 23.7107V21.1551C7.18823 20.8728 6.94985 20.644 6.65581 20.644H5.59101C5.29697 20.644 5.05859 20.8728 5.05859 21.1551V23.7107" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path d="M22.0977 23.7107V21.1551C22.0977 20.8728 22.336 20.644 22.6301 20.644H23.6949C23.989 20.644 24.2273 20.8728 24.2273 21.1551V23.7107" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="flex-1 w-full  whitespace-pre-line">@if(isset($aboutUs)) {!! $aboutUs['title1_sub3_'. $language] !!}@endif</p>
                                        </div>
                                        <div class="flex pr-0 gap-x-4 sm-pr-24px items-center">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.0595 11.662C15.376 11.662 16.4432 10.5936 16.4432 9.27581C16.4432 7.95794 15.376 6.88965 14.0595 6.88965C12.743 6.88965 11.6758 7.95794 11.6758 9.27581C11.6758 10.5936 12.743 11.662 14.0595 11.662Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M14.0572 12.7227C12.3019 12.7227 10.8789 14.1471 10.8789 15.9042V18.5555H12.4681L12.9978 23.3278H15.1167L15.6464 18.5555H17.2356V15.9042C17.2356 14.1471 15.8126 12.7227 14.0572 12.7227Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.58147 10.0702C7.19053 10.0702 8.49491 8.76442 8.49491 7.15372C8.49491 5.54302 7.19053 4.2373 5.58147 4.2373C3.97238 4.2373 2.66797 5.54302 2.66797 7.15372C2.66797 8.76442 3.97238 10.0702 5.58147 10.0702Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M8.96164 13.311C8.24162 11.7174 6.5079 10.8432 4.80009 11.2125C3.09223 11.5818 1.87366 13.0944 1.875 14.8435V18.025H3.46417L3.99389 23.3276H7.1722L7.70196 18.025H8.76139" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.5306 10.0702C24.1397 10.0702 25.4441 8.76442 25.4441 7.15372C25.4441 5.54302 24.1397 4.2373 22.5306 4.2373C20.9216 4.2373 19.6172 5.54302 19.6172 7.15372C19.6172 8.76442 20.9216 10.0702 22.5306 10.0702Z" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19.1562 13.311C19.8763 11.7174 21.61 10.8432 23.3178 11.2125C25.0257 11.5818 26.2442 13.0944 26.2429 14.8435V18.025H24.6537L24.124 23.3276H20.9457L20.416 18.025H19.3565" stroke="#633511" stroke-width="0.8" stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                            <p class="flex-1 w-full  whitespace-pre-line">@if(isset($aboutUs)) {!! $aboutUs['title1_sub4_'. $language] !!}@endif</p>
                                        </div>
                                        <div class="flex pr-0 gap-x-4 sm-pr-24px items-center">
                                            <svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g clip-path="url(#clip0_1378_7058)">
                                                    <path d="M13.6346 27.4065H0.56V0.593691H17.2676V5.43769C17.2676 5.59169 17.3936 5.71769 17.5476 5.71769H22.3916V12.4923C22.3916 12.6463 22.5176 12.7723 22.6716 12.7723C22.8256 12.7723 22.9516 12.6463 22.9516 12.4923V5.43769C22.9516 5.36349 22.9222 5.29209 22.869 5.24029L17.745 0.116291C17.6932 0.0644914 17.6218 0.0336914 17.5476 0.0336914H0.28C0.126 0.0336914 0 0.159691 0 0.313691V27.6865C0 27.8405 0.126 27.9665 0.28 27.9665H13.6346C13.7886 27.9665 13.9146 27.8405 13.9146 27.6865C13.9146 27.5325 13.7886 27.4065 13.6346 27.4065ZM17.8276 0.989891L21.9954 5.15769H17.8276V0.989891Z" fill="#633511"></path>
                                                    <path d="M18.4391 18.1581C18.6771 18.1581 18.9123 18.1889 19.1391 18.2477C19.2108 18.2665 19.2869 18.2562 19.351 18.2189C19.415 18.1816 19.4616 18.1205 19.4807 18.0489C19.4995 17.9773 19.4891 17.9011 19.4519 17.8371C19.4146 17.7731 19.3535 17.7264 19.2819 17.7073C19.0089 17.6345 18.7247 17.5981 18.4391 17.5981C16.6093 17.5981 15.1211 19.0863 15.1211 20.9175C15.1211 22.7487 16.6093 24.2355 18.4391 24.2355C20.2689 24.2355 21.7585 22.7473 21.7585 20.9175C21.7585 20.6319 21.7221 20.3477 21.6493 20.0747C21.64 20.039 21.6238 20.0055 21.6015 19.9762C21.5792 19.9468 21.5512 19.9222 21.5193 19.9037C21.4874 19.8852 21.4522 19.8732 21.4156 19.8685C21.379 19.8637 21.3419 19.8662 21.3063 19.8759C21.1565 19.9151 21.0683 20.0691 21.1075 20.2189C21.1677 20.4457 21.1985 20.6809 21.1985 20.9189C21.1985 22.4393 19.9609 23.6769 18.4391 23.6769C16.9173 23.6769 15.6811 22.4393 15.6811 20.9189C15.6811 19.3985 16.9187 18.1595 18.4391 18.1595V18.1581Z" fill="#633511"></path>
                                                    <path d="M24.0396 17.0997C23.908 17.1823 23.8688 17.3545 23.95 17.4861C24.5912 18.5123 24.93 19.6995 24.93 20.9175C24.93 24.4959 22.018 27.4079 18.4396 27.4079C14.8612 27.4079 11.9492 24.4959 11.9492 20.9175C11.9492 17.3391 14.8612 14.4271 18.4396 14.4271C19.6576 14.4271 20.8434 14.7659 21.871 15.4071C22.0026 15.4883 22.1748 15.4491 22.2574 15.3175C22.3386 15.1859 22.2994 15.0137 22.1678 14.9311C21.05 14.2336 19.7586 13.8644 18.441 13.8657C14.5532 13.8657 11.3906 17.0283 11.3906 20.9161C11.3906 24.8039 14.5532 27.9665 18.441 27.9665C22.3288 27.9665 25.4914 24.8039 25.4914 20.9161C25.4914 19.5931 25.1232 18.3037 24.426 17.1893C24.3865 17.1263 24.3237 17.0816 24.2513 17.0648C24.1789 17.048 24.1028 17.0605 24.0396 17.0997Z" fill="#633511"></path>
                                                    <path d="M27.9933 13.5829C27.9667 13.4863 27.8911 13.4107 27.7945 13.3855L26.3511 13.0061L25.9717 11.5627C25.9465 11.4661 25.8709 11.3891 25.7743 11.3639C25.6777 11.3387 25.5741 11.3639 25.5027 11.4367L23.2529 13.6865C23.2184 13.7211 23.1935 13.7641 23.1807 13.8112C23.1679 13.8584 23.1677 13.9081 23.1801 13.9553L23.5595 15.4015L18.2423 20.7187C18.2032 20.7579 18.1765 20.8078 18.1657 20.8621C18.1548 20.9164 18.1603 20.9727 18.1814 21.0239C18.2025 21.0751 18.2383 21.1189 18.2843 21.1498C18.3302 21.1807 18.3843 21.1973 18.4397 21.1975C18.5111 21.1975 18.5825 21.1695 18.6371 21.1149L23.9543 15.7977L25.4005 16.1771C25.4243 16.1827 25.4481 16.1869 25.4719 16.1869C25.546 16.1866 25.617 16.1569 25.6693 16.1043L27.9191 13.8545C27.9905 13.7831 28.0171 13.6795 27.9919 13.5829H27.9933ZM25.3893 15.5947L24.1013 15.2559L23.7625 13.9679L25.5531 12.1773L25.8499 13.3071C25.8751 13.4051 25.9521 13.4807 26.0501 13.5073L27.1799 13.8041L25.3893 15.5947ZM11.1583 14.7939C11.0491 14.6847 10.8713 14.6847 10.7621 14.7939L8.45489 17.1011L7.95509 16.6013C7.85009 16.4963 7.66389 16.4963 7.55889 16.6013L4.93389 19.2263L4.24929 18.5417C4.14009 18.4325 3.96229 18.4325 3.85309 18.5417L2.50909 19.8857C2.46996 19.9249 2.4433 19.9748 2.43247 20.0291C2.42164 20.0834 2.42713 20.1397 2.44824 20.1909C2.46934 20.2421 2.50513 20.2859 2.55108 20.3168C2.59704 20.3477 2.65111 20.3643 2.70649 20.3645C2.77789 20.3645 2.84929 20.3365 2.90389 20.2819L4.05049 19.1353L4.73509 19.8199C4.84009 19.9249 5.02629 19.9249 5.13129 19.8199L7.75629 17.1949L8.25609 17.6947C8.30789 17.7465 8.37929 17.7773 8.45349 17.7773C8.52769 17.7773 8.59909 17.7479 8.65089 17.6947L11.1555 15.1901C11.2647 15.0809 11.2647 14.9031 11.1555 14.7939H11.1583ZM2.58469 5.71771H3.32389C3.47789 5.71771 3.60389 5.59171 3.60389 5.43771C3.60389 5.28371 3.47789 5.15771 3.32389 5.15771H2.58469C2.43069 5.15771 2.30469 5.28371 2.30469 5.43771C2.30469 5.59171 2.43069 5.71771 2.58469 5.71771ZM4.85689 5.71771H6.63909C6.79309 5.71771 6.91909 5.59171 6.91909 5.43771C6.91909 5.28371 6.79309 5.15771 6.63909 5.15771H4.85689C4.70289 5.15771 4.57689 5.28371 4.57689 5.43771C4.57689 5.59171 4.70289 5.71771 4.85689 5.71771ZM13.7315 5.71771C13.8855 5.71771 14.0115 5.59171 14.0115 5.43771C14.0115 5.28371 13.8855 5.15771 13.7315 5.15771H8.17209C8.01809 5.15771 7.89209 5.28371 7.89209 5.43771C7.89209 5.59171 8.01809 5.71771 8.17209 5.71771H13.7315ZM2.58469 9.23031H3.32389C3.47789 9.23031 3.60389 9.10431 3.60389 8.95031C3.60389 8.79631 3.47789 8.67031 3.32389 8.67031H2.58469C2.43069 8.67031 2.30469 8.79631 2.30469 8.95031C2.30469 9.10431 2.43069 9.23031 2.58469 9.23031ZM17.4807 8.95031C17.4807 8.79631 17.3547 8.67031 17.2007 8.67031H4.85689C4.70289 8.67031 4.57689 8.79631 4.57689 8.95031C4.57689 9.10431 4.70289 9.23031 4.85689 9.23031H17.2021C17.3561 9.23031 17.4821 9.10431 17.4821 8.95031H17.4807Z" fill="#633511"></path>
                                                </g>
                                                <defs>
                                                    <clipPath id="clip0_1378_7058">
                                                        <rect width="28" height="28" fill="white"></rect>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                            <p class="flex-1 w-full  whitespace-pre-line">@if(isset($aboutUs)) {!! $aboutUs['title1_sub5_'. $language] !!}@endif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contentWrapper-img flex-1 ">
                                <div class="overflow-hidden w-full h-full">
                                    @if(isset($aboutUs))
                                        <img  src="{{ asset('/storage/'.$aboutUs['title1_images']) }}" alt="service provider" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-300px min-h-350px h-full object-center object-cover transform transition-transform duration-300 hover:scale-110" style="color: transparent;">
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="bg-F8F4F0  py-60px">
                    <div class="max-width-1080px m-auto flex flex-col sm:flex-row px-6 items-center">
                        <div class="self-start sm:self-center flex-1 pr-4">
                            <h2>@if(isset($aboutUs)) {!! $aboutUs['title2_'. $language] !!}@endif</h2>
                            <div class="w-12 h-0.5 bg-yellow-900"></div>
                        </div>
                        <div class=" w-full flex-1 flex flex-col gap-5 sm:border-solid justify-center py-0 px-6 sm-border-E6E6E6 sm:border-l-2 ">
                            <p class=" self-center">
                                <svg width="61" height="60" viewBox="0 0 61 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.4984 27.324C15.4144 32.172 17.6944 36.78 21.6064 39.66C23.0584 40.74 23.8984 42.336 23.8984 44.064V47.988C23.8984 48.324 24.1624 48.588 24.4984 48.588H36.4984C36.8344 48.588 37.0984 48.324 37.0984 47.988V44.064C37.0984 42.336 37.9504 40.716 39.4384 39.612C43.2904 36.756 45.4984 32.364 45.4984 27.576C45.4984 23.46 43.8664 19.608 40.8904 16.752C37.9144 13.896 34.0144 12.42 29.8864 12.588C22.0984 12.9 15.6544 19.5 15.5104 27.3L15.4984 27.324ZM40.0504 17.64C42.7864 20.268 44.2984 23.796 44.2984 27.588C44.2984 31.992 42.2704 36.024 38.7184 38.652C36.9304 39.984 35.8984 41.952 35.8984 44.064V47.388H31.0984V28.2H35.2984C35.6344 28.2 35.8984 27.936 35.8984 27.6C35.8984 27.264 35.6344 27 35.2984 27H25.6984C25.3624 27 25.0984 27.264 25.0984 27.6C25.0984 27.936 25.3624 28.2 25.6984 28.2H29.8984V47.4H25.0984V44.076C25.0984 41.964 24.0904 40.008 22.3144 38.7C18.7144 36.048 16.6144 31.8 16.6984 27.348C16.8304 20.172 22.7584 14.1 29.9224 13.812C33.7144 13.644 37.3144 15.024 40.0504 17.652V17.64ZM36.4984 50.988H24.4984C24.1624 50.988 23.8984 51.252 23.8984 51.588V53.988C23.8984 54.7836 24.2145 55.5467 24.7771 56.1093C25.3397 56.6719 26.1028 56.988 26.8984 56.988H34.0984C34.8941 56.988 35.6572 56.6719 36.2198 56.1093C36.7824 55.5467 37.0984 54.7836 37.0984 53.988V51.588C37.0984 51.252 36.8344 50.988 36.4984 50.988ZM35.8984 53.988C35.8984 54.984 35.0944 55.788 34.0984 55.788H26.8984C25.9024 55.788 25.0984 54.984 25.0984 53.988V52.188H35.8984V53.988ZM30.4984 9C30.1624 9 29.8984 8.736 29.8984 8.4V3.6C29.8984 3.264 30.1624 3 30.4984 3C30.8344 3 31.0984 3.264 31.0984 3.6V8.4C31.0984 8.736 30.8344 9 30.4984 9ZM17.3464 13.596C17.5864 13.836 17.5864 14.208 17.3464 14.448C17.2921 14.5046 17.2269 14.5497 17.1547 14.5805C17.0826 14.6112 17.0049 14.6271 16.9264 14.6271C16.848 14.6271 16.7703 14.6112 16.6981 14.5805C16.626 14.5497 16.5608 14.5046 16.5064 14.448L13.1104 11.052C12.8704 10.812 12.8704 10.44 13.1104 10.2C13.3504 9.96 13.7224 9.96 13.9624 10.2L17.3584 13.596H17.3464ZM47.8984 44.148C48.1384 44.388 48.1384 44.76 47.8984 45C47.8441 45.0566 47.7789 45.1017 47.7067 45.1325C47.6346 45.1632 47.5569 45.1791 47.4784 45.1791C47.4 45.1791 47.3223 45.1632 47.2501 45.1325C47.178 45.1017 47.1128 45.0566 47.0584 45L43.6624 41.604C43.4224 41.364 43.4224 40.992 43.6624 40.752C43.9024 40.512 44.2744 40.512 44.5144 40.752L47.9104 44.148H47.8984ZM11.8984 27.6C11.8984 27.936 11.6344 28.2 11.2984 28.2H6.49844C6.16244 28.2 5.89844 27.936 5.89844 27.6C5.89844 27.264 6.16244 27 6.49844 27H11.2984C11.6344 27 11.8984 27.264 11.8984 27.6ZM49.6984 28.2C49.3624 28.2 49.0984 27.936 49.0984 27.6C49.0984 27.264 49.3624 27 49.6984 27H54.4984C54.8344 27 55.0984 27.264 55.0984 27.6C55.0984 27.936 54.8344 28.2 54.4984 28.2H49.6984ZM13.0984 44.148L16.4944 40.752C16.7344 40.512 17.1064 40.512 17.3464 40.752C17.5864 40.992 17.5864 41.364 17.3464 41.604L13.9504 45C13.8961 45.0566 13.8309 45.1017 13.7587 45.1325C13.6866 45.1632 13.6089 45.1791 13.5304 45.1791C13.452 45.1791 13.3743 45.1632 13.3021 45.1325C13.23 45.1017 13.1648 45.0566 13.1104 45C12.8704 44.76 12.8704 44.388 13.1104 44.148H13.0984ZM47.8984 11.052L44.5024 14.448C44.4481 14.5046 44.3829 14.5497 44.3107 14.5805C44.2386 14.6112 44.1609 14.6271 44.0824 14.6271C44.004 14.6271 43.9263 14.6112 43.8541 14.5805C43.782 14.5497 43.7168 14.5046 43.6624 14.448C43.4224 14.208 43.4224 13.836 43.6624 13.596L47.0584 10.2C47.2984 9.96 47.6704 9.96 47.9104 10.2C48.1504 10.44 48.1504 10.812 47.9104 11.052H47.8984Z" fill="#633511"></path>
                                </svg>
                            </p>
                            <p class="whitespace-pre-line text-center w-full text-md sm:text-sm lg:text-lg">@if(isset($aboutUs)) {!! $aboutUs['title2_sub1_'. $language] !!}@endif</p>
                        </div>
                        <div class=" w-full flex-1 flex flex-col gap-5 sm:border-solid justify-center py-0 px-6 sm-border-E6E6E6 sm:border-l-2 ">
                            <p class=" self-center">
                                <svg width="61" height="60" viewBox="0 0 61 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M41.4342 26.5556C41.3973 26.5556 41.3606 26.5511 41.3248 26.5421C41.2061 26.5131 41.1037 26.4382 41.0401 26.3338C40.9765 26.2294 40.9569 26.1041 40.9856 25.9853L43.5669 15.365C43.5797 15.3047 43.6045 15.2476 43.6398 15.197C43.6751 15.1465 43.7202 15.1035 43.7724 15.0707C43.8245 15.0379 43.8828 15.0159 43.9436 15.006C44.0045 14.9961 44.0667 14.9985 44.1266 15.013C44.1865 15.0276 44.2428 15.054 44.2923 15.0907C44.3419 15.1274 44.3835 15.1737 44.4148 15.2268C44.4461 15.2799 44.4665 15.3388 44.4746 15.3999C44.4828 15.461 44.4786 15.5231 44.4624 15.5825L41.881 26.2034C41.8567 26.3037 41.7995 26.3928 41.7184 26.4567C41.6374 26.5205 41.5374 26.5554 41.4342 26.5556Z" fill="#633511"></path>
                                    <path d="M30.0381 55.9993C29.9632 55.9993 29.8895 55.9811 29.8232 55.9462C29.757 55.9114 29.7002 55.8609 29.6579 55.7992C29.6155 55.7374 29.5888 55.6663 29.5801 55.592C29.5714 55.5176 29.5809 55.4422 29.6079 55.3724L40.879 26.2188L29.7234 15.8105C29.6554 15.7475 29.608 15.6654 29.5874 15.5749C29.5668 15.4845 29.5739 15.3899 29.6079 15.3036C29.6419 15.2173 29.7011 15.1432 29.7779 15.0911C29.8546 15.039 29.9453 15.0113 30.0381 15.0116H44.0012C44.1236 15.0116 44.241 15.0602 44.3276 15.1468L54.9479 25.7671C55.0294 25.8483 55.0776 25.9572 55.0828 26.0723C55.088 26.1873 55.05 26.3001 54.9761 26.3884L30.3921 55.8327C30.3489 55.8848 30.2949 55.9267 30.2337 55.9555C30.1725 55.9843 30.1057 55.9992 30.0381 55.9993ZM31.2058 15.9347L41.7339 25.7572C41.8012 25.8201 41.8481 25.9016 41.8687 25.9912C41.8893 26.0809 41.8826 26.1747 41.8495 26.2606L31.4763 53.0965L53.9983 26.1223L43.8107 15.9347H31.2058ZM18.6544 26.5556C18.5512 26.5555 18.451 26.5207 18.3699 26.4569C18.2887 26.393 18.2314 26.3038 18.207 26.2034L15.6257 15.5825C15.6094 15.5231 15.6053 15.461 15.6134 15.3999C15.6216 15.3388 15.642 15.2799 15.6733 15.2268C15.7046 15.1737 15.7462 15.1274 15.7957 15.0907C15.8452 15.054 15.9016 15.0276 15.9615 15.013C16.0214 14.9985 16.0836 14.9961 16.1444 15.006C16.2053 15.0159 16.2635 15.0379 16.3157 15.0707C16.3679 15.1035 16.4129 15.1465 16.4482 15.197C16.4835 15.2476 16.5083 15.3047 16.5212 15.365L19.1025 25.9853C19.1312 26.1041 19.1116 26.2294 19.048 26.3338C18.9844 26.4382 18.882 26.5131 18.7632 26.5421C18.7277 26.551 18.6911 26.5556 18.6544 26.5556Z" fill="#633511"></path><path d="M54.629 26.5554H5.46095C5.3387 26.5554 5.22145 26.5069 5.13501 26.4204C5.04856 26.334 5 26.2167 5 26.0945C5 25.9722 5.04856 25.855 5.13501 25.7686C5.22145 25.6821 5.3387 25.6335 5.46095 25.6335H54.629C54.7513 25.6335 54.8685 25.6821 54.955 25.7686C55.0414 25.855 55.09 25.9722 55.09 26.0945C55.09 26.2167 55.0414 26.334 54.955 26.4204C54.8685 26.5069 54.7513 26.5554 54.629 26.5554Z" fill="#633511"></path>
                                    <path d="M30.0452 56.0002C29.9777 56.0003 29.911 55.9855 29.8498 55.9569C29.7886 55.9283 29.7345 55.8867 29.6912 55.8348L5.10716 26.3905C5.03331 26.3022 4.99524 26.1894 5.00048 26.0744C5.00571 25.9593 5.05386 25.8505 5.13543 25.7692L15.7557 15.1489C15.8423 15.0623 15.9597 15.0137 16.0821 15.0137H30.0452C30.138 15.0134 30.2286 15.0411 30.3054 15.0932C30.3821 15.1454 30.4414 15.2194 30.4754 15.3057C30.5094 15.392 30.5165 15.4866 30.4959 15.577C30.4753 15.6675 30.4279 15.7496 30.3599 15.8127L19.2043 26.2197L30.4754 55.3733C30.5024 55.4431 30.5119 55.5185 30.5032 55.5928C30.4945 55.6672 30.4678 55.7383 30.4254 55.8C30.3831 55.8618 30.3263 55.9123 30.2601 55.9471C30.1938 55.982 30.1201 56.0002 30.0452 56.0002ZM6.08499 26.1232L28.607 53.0974L18.232 26.2615C18.1988 26.1756 18.1922 26.0818 18.2127 25.9921C18.2333 25.9024 18.2803 25.8209 18.3475 25.7581L28.8775 15.9356H16.2726L6.08499 26.1232Z" fill="#633511"></path>
                                    <path d="M29.968 5.4C29.968 5.736 30.232 6 30.568 6C30.904 6 31.168 5.736 31.168 5.4V0.6C31.168 0.264 30.904 0 30.568 0C30.232 0 29.968 0.264 29.968 0.6V5.4Z" fill="#633511"></path>
                                    <path d="M17.416 11.448C17.656 11.208 17.656 10.836 17.416 10.596H17.428L14.032 7.2C13.792 6.96 13.42 6.96 13.18 7.2C12.94 7.44 12.94 7.812 13.18 8.052L16.576 11.448C16.6303 11.5046 16.6955 11.5497 16.7677 11.5805C16.8399 11.6112 16.9175 11.6271 16.996 11.6271C17.0745 11.6271 17.1521 11.6112 17.2243 11.5805C17.2965 11.5497 17.3617 11.5046 17.416 11.448Z" fill="#633511"></path>
                                    <path d="M44.572 11.448L47.968 8.052H47.98C48.22 7.812 48.22 7.44 47.98 7.2C47.74 6.96 47.368 6.96 47.128 7.2L43.732 10.596C43.492 10.836 43.492 11.208 43.732 11.448C43.7863 11.5046 43.8515 11.5497 43.9237 11.5805C43.9959 11.6112 44.0735 11.6271 44.152 11.6271C44.2305 11.6271 44.3081 11.6112 44.3803 11.5805C44.4525 11.5497 44.5177 11.5046 44.572 11.448Z" fill="#633511"></path>
                                </svg>
                            </p>
                            <p class="whitespace-pre-line text-center w-full text-md sm:text-sm lg:text-lg">@if(isset($aboutUs)) {!! $aboutUs['title2_sub2_'. $language] !!}@endif</p>
                        </div>
                        <div class=" w-full flex-1 flex flex-col gap-5 sm:border-solid justify-center py-0 px-6 sm-border-E6E6E6 sm:border-l-2 sm:border-r-2">
                            <p class=" self-center">
                                <svg width="61" height="60" viewBox="0 0 61 60" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_92_2903)">
                                        <mask id="mask0_92_2903" maskUnits="userSpaceOnUse" x="0" y="0" width="61" height="60" style="mask-type: luminance;">
                                            <path d="M0.5 0.000175476H60.4998V60H0.5V0.000175476Z" fill="white"></path>
                                        </mask>
                                        <g mask="url(#mask0_92_2903)">
                                            <path d="M30.3317 35.8142V16.091C30.3317 14.5346 29.0699 13.2729 27.5135 13.2729C25.9571 13.2729 24.6953 14.5346 24.6953 16.091V40.5151" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M23.1211 55.5L14.1427 34.7142C13.7477 33.7721 14.2012 32.6892 15.1497 32.3097C16.8621 31.6248 18.8184 32.2838 19.7673 33.8654L20.939 35.8182" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M30.332 33.9355C30.332 32.3288 31.6765 31.0362 33.3018 31.1213C34.8257 31.2012 35.9684 32.569 35.9684 34.095V34.8749C35.9684 33.2682 37.3129 31.9756 38.938 32.0607C40.462 32.1405 41.6047 33.5083 41.6047 35.0343V35.8142C41.6047 34.2076 42.9492 32.915 44.5744 33.0001C46.0984 33.0799 47.2411 34.4477 47.2411 35.9737V38.2554C47.241 43.5094 44.5744 51 42.6211 56" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M35.9688 34.8788V36.7576" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M41.6055 35.8183V37.697" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M34.0908 19.7266C34.708 18.6144 35.0314 17.3631 35.0302 16.0912C35.0302 11.9408 31.6656 8.57609 27.5151 8.57609C23.3647 8.57609 20 11.9408 20 16.0912C19.9988 17.3631 20.3221 18.6144 20.9394 19.7266" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                            <path d="M34.0924 26.3708C37.4786 24.2001 39.7287 20.4121 39.7287 16.0913C39.7287 9.34672 34.2611 3.87924 27.5166 3.87924C20.7722 3.87924 15.3047 9.34672 15.3047 16.0913C15.3047 20.4121 17.5547 24.2001 20.9409 26.3708" stroke="#633511" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"></path>
                                        </g>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_92_2903">
                                            <rect width="60" height="60" fill="white" transform="translate(0.5)"></rect>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </p>
                            <p class="whitespace-pre-line text-center w-full text-md sm:text-sm lg:text-lg">@if(isset($aboutUs)) {!! $aboutUs['title2_sub3_'. $language] !!}@endif</p>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="max-width-1080px m-auto px-smClamp">
                        <div class="flex flex-wrap-reverse gap-8 p-x-8">
                            <div class="contentWrapper-img flex-1 ">
                                <div class="overflow-hidden w-full h-full">
                                    @if(isset($aboutUs))
                                        <img  src="{{ asset('/storage/'.$aboutUs['title3_images']) }}" alt="to partners" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-300px h-full object-center object-cover aspect-3-2 transform transition-transform duration-300 hover:scale-110" style="color: transparent;">
                                    @endif
                                </div>
                            </div>
                            <div class="contentWrapper-description flex-1 min-w-300px">
                                <div class="w-full flex flex-col">
                                    <div class="mb-smClamp">
                                        <h2 class="whitespace-pre-line text-3xl">@if(isset($aboutUs)) {!! $aboutUs['title3_'. $language] !!}@endif</h2>
                                        <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                                    </div>
                                    <div class="flex flex-col pr-0 sm-pr-24px">
                                        <div class="flex-1 w-full   text-base font-light leading-tight">
                                            <p class="whitespace-pre-line text-left">@if(isset($aboutUs)) {!! $aboutUs['title3_sub1_'. $language] !!}@endif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="max-width-1080px m-auto px-smClamp">
                        <div class="flex flex-wrap gap-8 p-x-8">
                            <div class="contentWrapper-description flex-1 min-w-300px">
                                <div class="w-full flex flex-col">
                                    <div class="mb-smClamp">
                                        <h2 class="whitespace-pre-line text-3xl">@if(isset($aboutUs)) {!! $aboutUs['title4_'. $language] !!}@endif</h2>
                                        <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                                    </div>
                                    <div class="flex flex-col pr-0 sm-pr-24px">
                                        <div class="flex-1 w-full text-base font-light leading-tight">
                                            <p class="whitespace-pre-line text-left">@if(isset($aboutUs)) {!! $aboutUs['title4_sub1_'. $language] !!}@endif</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="contentWrapper-img flex-1 ">
                                <div class="overflow-hidden w-full h-full">
                                    @if(isset($aboutUs))
                                        <img  src="{{ asset('/storage/'.$aboutUs['title4_images']) }}" alt="to guests" loading="lazy" width="546" height="364" decoding="async" data-nimg="1" class="w-full min-w-300px h-full object-center object-cover aspect-3-2 transform transition-transform duration-300 hover:scale-110" style="color: transparent;">
                                    @endif
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
