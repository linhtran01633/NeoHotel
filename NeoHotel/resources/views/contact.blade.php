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
                            <h1 class="text-28px md:text-4xl text-white text-center">{{__('screen.title.contact')}}</h1>
                            <nav aria-label="Breadcrumb">
                                <ol class="breadcrumbs_breadcrumbList___U1J7">
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB">{{__('screen.title.home')}}</button>
                                    </li>
                                    <li class="breadcrumbs_crumbWrapper__r0ohj">
                                        <button class="breadcrumbs_crumbLink___SxmB" aria-current="page">{{__('screen.title.contact')}}</button>
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="faq-container max-width-1080px m-auto flex sm:flex-row px-smClamp">
                        <div class="w-full flex flex-col">
                            <div class="mb-smClamp">
                                <h2 class="whitespace-pre-line text-headerClamp ">{{__('contact.contact_form_section')}}</h2>
                                <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                            </div>

                            @if (Session::has('message'))
                                <div class="text-red-500 p-2">
                                    {{ Session::get('message') }}
                                    @php
                                        Session::forget('message');
                                    @endphp
                                </div>
                            @endif
                            <form action="{{route('submit-contact')}}" method="post">
                                @csrf
                                <input type="text" name="honeypot" style="display:none;">
                                <div class="flex flex-col gap-y-5 sm:gap-y-10 mt-4">
                                    <div class="grid grid-cols-1 grid-rows-4 md:grid-cols-2 md:grid-rows-2 gap-x-5 gap-y-5 sm:gap-y-10">
                                        <div class="flex flex-col gap-y-3 ">
                                            <label>
                                                <span class="label inline font-medium  text-16px line-clamp-5">{{__('contact.name')}}</span>
                                                <span class="text-red-600 ml-1">*</span>
                                            </label>
                                            <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="name">
                                        </div>
                                        <div class="flex flex-col gap-y-3">
                                            <label>
                                                <span class="label inline font-medium  text-16px line-clamp-5">{{__('contact.sex')}}</span>
                                            </label>
                                            <div class="ant-select sc-bdfCDU iknHgW css-125enb3 ant-select-single ant-select-show-arrow" name="sex">
                                                <div class="ant-select-selector">
                                                    <select name="sex" required class="w-full h-44px border border-d9d9d9">
                                                        <option value="Ms.">Ms.</option>
                                                        <option value="Mr.">Mr.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-col gap-y-3 ">
                                            <label>
                                                <span class="label inline font-medium  text-16px line-clamp-5">{{__('contact.email')}}</span>
                                                <span class="text-red-600 ml-1">*</span>
                                            </label>
                                            <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="email" value="" name="email">
                                        </div>
                                        <div class="flex flex-col gap-y-3 ">
                                            <label>
                                                <span class="label inline font-medium  text-16px line-clamp-5">{{__('contact.phone')}}</span>
                                                <span class="text-red-600 ml-1">*</span>
                                            </label>
                                            <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="tel" value="" name="phone">
                                        </div>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <div class="flex flex-col gap-y-3 ">
                                            <label>
                                                <span class="label inline font-medium  text-16px line-clamp-5">{{__('contact.inquiry')}}</span>
                                                <span class="text-red-600 ml-1">*</span>
                                            </label>
                                            <textarea name="inquiry" required placeholder="Type here" class="ant-input css-125enb3" style="resize: none; height: 100px;"></textarea>
                                        </div>
                                    </div>
                                    <div class="w-154px self-end">
                                        <button class="disabled:bg-black/30 self-end font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-633511 hover-bg-7E502C" type="submit">{{__('contact.button_submit')}}</button>
                                    </div>
                                </div>
                            </form>
                            <div class="Toastify"></div>
                        </div>
                    </div>
                </div>

                <div class="">
                    <div class="faq-container max-width-1080px m-auto flex sm:flex-row px-smClamp">
                        <div class="w-full flex flex-col">
                            <div class="mb-smClamp">
                                <h2 class="whitespace-pre-line text-headerClamp">@if(isset($data)) {!! $data['title_' . $language] !!}@endif</h2>
                                <div class="w-12 h-0.5 bg-yellow-900 mt-2"></div>
                            </div>
                            <div class="flex gap-6 flex-col sm:flex-row mt-6">
                                <div class="px-5 py-2 w-full border flex gap-3 sm-w-33p items-center">
                                    <div class="min-w-10">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_996_5004)">
                                                <path d="M33.8182 5.68406C25.9713 -1.89469 13.531 -1.89469 5.6841 5.68406C-2.08495 13.728 -1.86213 26.5468 6.18178 34.3159C14.0287 41.8946 26.469 41.8946 34.3159 34.3159C42.085 26.272 41.8621 13.4531 33.8182 5.68406ZM33.3642 33.3642L33.3575 33.3574C25.9736 40.7346 14.0075 40.7291 6.63042 33.3453C-0.746712 25.9614 -0.741253 13.9954 6.6426 6.61827C14.0264 -0.758855 25.9925 -0.753397 33.3697 6.63037C35.1242 8.38651 36.5156 10.4711 37.4643 12.7651C38.413 15.0591 38.9005 17.5175 38.8989 20C38.8991 22.4819 38.4104 24.9395 37.4608 27.2325C36.5111 29.5256 35.1191 31.6091 33.3642 33.3642Z" fill="#633511"></path>
                                                <path d="M31.3758 25.7641L27.5825 21.9843C26.7216 21.1214 25.3242 21.1197 24.4612 21.9806L22.2842 24.1577C22.2045 24.2375 22.0992 24.2867 21.9869 24.2966C21.8746 24.3065 21.7623 24.2764 21.67 24.2117C20.4804 23.3804 19.3669 22.4453 18.3424 21.4174C17.4249 20.5019 16.5808 19.5157 15.8181 18.4678C15.7512 18.3767 15.7191 18.2646 15.7278 18.1519C15.7365 18.0392 15.7852 17.9334 15.8653 17.8536L18.0926 15.6262C18.9526 14.7646 18.9526 13.3695 18.0926 12.5079L14.2994 8.71463C13.4253 7.87898 12.0485 7.87898 11.1744 8.71463L9.97296 9.91604C8.15856 11.71 7.51083 14.3739 8.29903 16.8006C8.88722 18.5761 9.71857 20.2615 10.7694 21.8088C11.7154 23.2273 12.8007 24.5478 14.0092 25.7506C15.3231 27.0738 16.7785 28.2486 18.3492 29.2536C20.0758 30.3804 21.9717 31.2235 23.9648 31.751C24.4772 31.8773 25.003 31.9407 25.5307 31.9399C27.3397 31.9289 29.0704 31.2007 30.3432 29.915L31.3759 28.8824C32.2357 28.0208 32.2357 26.6257 31.3758 25.7641ZM30.42 27.9618L30.4173 27.9645L30.424 27.9443L29.3913 28.977C28.7389 29.6376 27.9272 30.1188 27.0345 30.3742C26.1419 30.6296 25.1984 30.6505 24.2953 30.4349C22.4449 29.9396 20.6858 29.1512 19.0847 28.0995C17.5972 27.1489 16.2187 26.0375 14.9742 24.7855C13.8291 23.6487 12.8003 22.4006 11.9031 21.0597C10.9217 19.6168 10.1448 18.045 9.59472 16.3889C9.28552 15.4351 9.24803 14.414 9.48646 13.44C9.72489 12.466 10.2298 11.5777 10.9447 10.8745L12.1461 9.67313C12.4801 9.3376 13.0229 9.33642 13.3583 9.67044L17.1542 13.4664C17.4898 13.8004 17.491 14.3432 17.1569 14.6786L14.9269 16.9087C14.2878 17.5408 14.2074 18.5453 14.7379 19.2711C15.5435 20.3767 16.435 21.4171 17.404 22.3827C18.4844 23.4677 19.659 24.4548 20.9138 25.3323C21.6389 25.838 22.6219 25.7527 23.2491 25.1298L25.4022 22.9429C25.7363 22.6074 26.279 22.6062 26.6145 22.9402L30.4172 26.7497C30.7528 27.0836 30.754 27.6263 30.42 27.9618Z" fill="#633511"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_996_5004">
                                                    <rect width="40" height="40" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-1">
                                        <h4 class="text-xl">@if(isset($data)) {!! $data['title_sub1_' . $language] !!}@endif</h4>
                                        <p class="text-base font-normal">@if(isset($data)) {!! $data['comment1_' . $language] !!}@endif</p>
                                    </div>
                                </div>
                                <div class="px-5 py-2 w-full border flex gap-3 sm-w-33p items-center">
                                    <div class="min-w-10">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_996_5010)">
                                                <path d="M20 0C8.95442 0 0 8.95442 0 20C0 31.0456 8.95442 40 20 40C31.0456 40 40 31.0456 40 20C39.9877 8.95967 31.0403 0.0123333 20 0ZM20 38.6667C9.69083 38.6667 1.33333 30.3092 1.33333 20C1.33333 9.69083 9.69083 1.33333 20 1.33333C30.3092 1.33333 38.6667 9.69083 38.6667 20C38.655 30.3043 30.3043 38.655 20 38.6667Z" fill="#633511"></path>
                                                <path d="M29.3333 12H10.6667C10.4899 12 10.3203 12.0702 10.1953 12.1953C10.0702 12.3203 10 12.4899 10 12.6667V27.3333C10 27.5101 10.0702 27.6797 10.1953 27.8047C10.3203 27.9298 10.4899 28 10.6667 28H29.3333C29.5101 28 29.6797 27.9298 29.8047 27.8047C29.9298 27.6797 30 27.5101 30 27.3333V12.6667C30 12.4899 29.9298 12.3203 29.8047 12.1953C29.6797 12.0702 29.5101 12 29.3333 12ZM27.5332 13.3333L20 19.7888L12.4668 13.3333H27.5332ZM11.3333 26.6667V14.1158L19.5661 21.1725C19.6868 21.2758 19.8404 21.3326 19.9993 21.3326C20.1582 21.3326 20.3119 21.2758 20.4326 21.1725L28.6667 14.1158V26.6667H11.3333Z" fill="#633511"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_996_5010">
                                                    <rect width="40" height="40" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-1">
                                        <h4 class="text-xl">@if(isset($data)) {!! $data['title_sub2_' . $language] !!}@endif</h4>
                                        <p class="  text-base font-normal">@if(isset($data)) {!! $data['comment2_' . $language] !!}@endif</p>
                                    </div>
                                </div>
                                <div class="px-5 py-2 w-full border flex gap-3 sm-w-33p items-center">
                                    <div class="min-w-10">
                                        <svg width="40" height="40" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_996_5014)">
                                                <path d="M20 39.2H20.0006C30.599 39.188 39.188 30.599 39.2 20.0006V20C39.2 9.39628 30.6037 0.8 20 0.8C9.39628 0.8 0.8 9.39628 0.8 20C0.8 30.6037 9.39628 39.2 20 39.2ZM0.533333 20C0.533333 9.24906 9.24882 0.533482 19.9997 0.533333C30.7458 0.54551 39.4547 9.25446 39.4667 20.0006C39.4664 30.7514 30.7508 39.4667 20 39.4667C9.24897 39.4667 0.533333 30.751 0.533333 20Z" fill="#633511" stroke="#633511" stroke-width="1.06667"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2532 29.1001L25.5603 20.5271C28.1345 16.3689 25.1437 11 20.2532 11C15.3628 11 12.372 16.3689 14.9461 20.5271L20.2532 29.1001ZM19.5997 29.9443C19.9002 30.4297 20.6063 30.4297 20.9068 29.9443L26.4106 21.0534C29.3971 16.2291 25.9272 10 20.2532 10C14.5793 10 11.1093 16.2291 14.0958 21.0534L19.5997 29.9443Z" fill="#633511"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2525 18.9998C21.3571 18.9998 22.2525 18.1043 22.2525 16.9998C22.2525 15.8952 21.3571 14.9998 20.2525 14.9998C19.148 14.9998 18.2525 15.8952 18.2525 16.9998C18.2525 18.1043 19.148 18.9998 20.2525 18.9998ZM20.2525 19.9998C21.9094 19.9998 23.2525 18.6566 23.2525 16.9998C23.2525 15.3429 21.9094 13.9998 20.2525 13.9998C18.5957 13.9998 17.2525 15.3429 17.2525 16.9998C17.2525 18.6566 18.5957 19.9998 20.2525 19.9998Z" fill="#633511"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2543 28.72L25.3914 20.4216C27.883 16.3967 24.9881 11.1998 20.2543 11.1998C15.5206 11.1998 12.6256 16.3967 15.1172 20.4216L20.2543 28.72ZM25.5614 20.5269C28.1356 16.3687 25.1448 10.9998 20.2543 10.9998C15.3639 10.9998 12.3731 16.3687 14.9472 20.5269L20.2543 29.0999L25.5614 20.5269ZM21.0779 30.0494C20.6992 30.6611 19.8094 30.6611 19.4307 30.0494L13.9269 21.1585C10.8579 16.2009 14.4236 9.7998 20.2543 9.7998C26.085 9.79981 29.6508 16.2009 26.5818 21.1585L21.0779 30.0494ZM20.2536 18.7996C21.2477 18.7996 22.0536 17.9937 22.0536 16.9996C22.0536 16.0054 21.2477 15.1996 20.2536 15.1996C19.2595 15.1996 18.4536 16.0054 18.4536 16.9996C18.4536 17.9937 19.2595 18.7996 20.2536 18.7996ZM23.4536 16.9996C23.4536 18.7669 22.0209 20.1996 20.2536 20.1996C18.4863 20.1996 17.0536 18.7669 17.0536 16.9996C17.0536 15.2322 18.4863 13.7996 20.2536 13.7996C22.0209 13.7996 23.4536 15.2322 23.4536 16.9996ZM20.9078 29.9441C20.6074 30.4295 19.9013 30.4295 19.6008 29.9441L14.0969 21.0532C11.1104 16.2289 14.5804 9.9998 20.2543 9.9998C25.9283 9.9998 29.3982 16.2289 26.4117 21.0533L20.9078 29.9441ZM22.2536 16.9996C22.2536 18.1041 21.3582 18.9996 20.2536 18.9996C19.1491 18.9996 18.2536 18.1041 18.2536 16.9996C18.2536 15.895 19.1491 14.9996 20.2536 14.9996C21.3582 14.9996 22.2536 15.895 22.2536 16.9996ZM23.2536 16.9996C23.2536 18.6564 21.9105 19.9996 20.2536 19.9996C18.5968 19.9996 17.2536 18.6564 17.2536 16.9996C17.2536 15.3427 18.5968 13.9996 20.2536 13.9996C21.9105 13.9996 23.2536 15.3427 23.2536 16.9996Z" fill="#633511"></path>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_996_5014">
                                                    <rect width="40" height="40" fill="white"></rect>
                                                </clipPath>
                                            </defs>
                                        </svg>
                                    </div>
                                    <div class="flex flex-col flex-1">
                                        <h4 class="text-xl">@if(isset($data)) {!! $data['title_sub3_' . $language] !!}@endif</h4>
                                        <p class="text-base font-normal">@if(isset($data)) {!! $data['comment3_' . $language] !!}@endif</p>
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
