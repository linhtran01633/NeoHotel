@extends('app_layout')
@section('content')
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col ">
            <div class="w-full py-xlClamp bg-[#F9F9F9]">
                <div class="max-w-[1080px] min-w-[60vw] m-auto flex flex-col items-center px-smClamp">
                    <div class="relative w-full flex flex-col sm:flex-row justify-center mb-8 gap-y-3">
                        <div class=" top-0 left-0 flex w-fit">
                        <button class="flex m-auto items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="self-center" width="20">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                            </svg>
                            <div>{{__('button.back')}}</div>
                        </button>
                        </div>
                        <div class="m-auto">
                        <h1 class="flex-1 text-headerClamp justify-center items-center">{{__('form.booking.detail')}}</h1>
                        </div>
                    </div>
                    <div class="flex flex-col w-full">
                        <div class="w-full flex gap-6">
                            <div class="font-medium flex flex-col sm:flex-row gap-y-2 max-w-[108px] sm:max-w-full text-center">
                                <div class="relative w-12 h-12 flex flex-shrink-0 items-center self-center justify-center rounded-full  w-6 h-6 bg-green-600 text-white"><span class="absolute m-auto text-white">1</span></div>
                                <p class="self-center ml-2">{{__('form.booking.stageone')}}</p>
                            </div>
                            <div class="flex-1">
                                <hr class="bg-[#4A4A4A] data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px my-[15px]">
                            </div>
                            <div class="font-medium flex flex-col sm:flex-row gap-y-2 max-w-[108px] sm:max-w-full text-center">
                                <div class="relative w-12 h-12 flex flex-shrink-0 items-center self-center justify-center rounded-full  w-6 h-6 bg-white text-gray-600 border border-gray-500"><span class="absolute m-auto text-gray-600">2</span></div>
                                <p class="self-center ml-2">{{__('form.booking.stagetwo')}}</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between mt-8 ">
                            <div class="flex w-full flex-col sm:flex-row">
                                <div class="w-full">
                                    <form>
                                        <div class="bg-white flex flex-col w-full sm:w-formClamp mb-8 md:mb-0 border py-6 px-smClamp border-neutral-200">
                                            <div class="text-2xl font-medium mb-6">{{__('form.booking.stageone')}}</div>
                                            <div class="flex flex-col gap-6">
                                                <div class="flex flex-col gap-y-3">
                                                    <label>
                                                        <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.booking.hotelname')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <div class="ant-select sc-bdfCDU iknHgW css-125enb3 ant-select-single ant-select-show-arrow" name="hotelName">
                                                        <div class="ant-select-selector">
                                                            <select class="w-full h-[44px] border border-[#d9d9d9] px-2">
                                                                <option value="1">{{__('home.slider.title')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-y-3">
                                                    <label>
                                                        <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.booking.roomtype')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <div class="ant-select sc-bdfCDU iknHgW css-125enb3 ant-select-single ant-select-show-arrow" name="roomTypeId">
                                                        <div class="ant-select-selector">
                                                            <select class="w-full h-[44px] border border-[#d9d9d9] px-2">
                                                                <option value="1">{{__('home.slider.title')}}</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-y-3">
                                                    <label>
                                                        <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.booking.checkin')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <div class="ant-picker css-125enb3 sc-eCstZk NZCqe w-full">
                                                        <div class="ant-picker-input">
                                                            <input class="w-full h-[44px] border border-[#d9d9d9] px-2" placeholder="Select date" title="14/07/2024" size="12" autocomplete="off" value="14/07/2024" name="startDate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-y-3">
                                                    <label>
                                                        <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.booking.checkout')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <div class="ant-picker css-125enb3 sc-eCstZk NZCqe w-full">
                                                        <div class="ant-picker-input">
                                                            <input class="w-full h-[44px] border border-[#d9d9d9] px-2" placeholder="Select date" title="14/07/2024" size="12" autocomplete="off" value="14/07/2024" name="endDate">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="guest-wrapper flex flex-col">
                                                    <div class="font-medium">
                                                        <label class="font-medium">{{__('form.booking.numberofguest')}}</label>
                                                        <span class="text-red-600 ml-1">*</span>
                                                        <p class="font-[12px] text-xsTitle">{{__('form.booking.desc_guest_field')}}</p>
                                                    </div>
                                                    <div class="flex gap-3">
                                                        <div class="flex flex-col gap-y-3 ">
                                                            <label>
                                                                <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5"></span>
                                                            </label>
                                                            <div class="ant-input-number-group-wrapper sc-dlfmHC jlwJDi css-125enb3">
                                                                <div class="grid grid-cols-2 gap-0">
                                                                    <div class="w-full">
                                                                        <input type="number" class="w-full h-[44px] border border-[#d9d9d9] px-2" >
                                                                    </div>
                                                                    <div class="w-full border border-[#d9d9d9] flex items-center justify-center bg-[rgba(0, 0, 0, 0.02)]">{{__('form.booking.adults')}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex flex-col gap-y-3 ">
                                                            <label><span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5"></span></label>
                                                            <div class="ant-input-number-group-wrapper sc-dlfmHC jlwJDi css-125enb3">
                                                                <div class="grid grid-cols-2 gap-0">
                                                                    <div class="w-full">
                                                                        <input type="number" class="w-full h-[44px] border border-[#d9d9d9] px-2" >
                                                                    </div>
                                                                    <div class="w-full border border-[#d9d9d9] flex items-center justify-center bg-[rgba(0, 0, 0, 0.02)]">{{__('form.booking.children')}}</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('bookingbanner.numberofrooms')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <div class="full">
                                                        <input type="number" name="numberOfRoom" class="w-24 h-[44px] border border-[#d9d9d9] px-2" >
                                                    </div>
                                                </div>
                                                <label class="flex items-center">
                                                    <input status="" class="ant-checkbox-input" type="checkbox" name="breakfast" value="true">
                                                    <span>{{__('form.booking.breakfast')}}</span>
                                                </label>
                                            </div>
                                            <div class="w-[154px] mt-8 self-end">
                                                <button type="submit" class="font-medium leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]">{{__('button.next')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                    <form>
                                        <div class="bg-white flex flex-col w-full sm:w-formClamp mb-8 md:mb-0 border py-6 px-smClamp border-neutral-200">
                                        <div class="text-2xl font-medium mb-6">{{__('form.booking.stagetwo')}}</div>
                                        <div class="flex flex-col gap-6">
                                            <div class="flex flex-col gap-y-3 ">
                                                <label>
                                                    <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.common.firstname')}}</span>
                                                    <span class="text-red-600 ml-1">*</span>
                                                </label>
                                                <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="firstname">
                                            </div>
                                            <div class="flex flex-col gap-y-3 ">
                                                <label>
                                                    <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.common.lastname')}}</span>
                                                    <span class="text-red-600 ml-1">*</span>
                                                </label>
                                                <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="lastname">
                                            </div>
                                            <div class="flex flex-col gap-y-3 ">
                                                <label>
                                                    <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.common.email')}}</span>
                                                    <span class="text-red-600 ml-1">*</span>
                                                </label>
                                                <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="email">
                                            </div>
                                            <div class="flex flex-col gap-y-3 ">
                                                <label>
                                                    <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.common.phone')}}</span>
                                                    <span class="text-red-600 ml-1">*</span>
                                                </label>
                                                <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="phoneNumber">
                                            </div>
                                            <div class="flex flex-col gap-y-3 ">
                                                <label>
                                                    <span class="label inline font-medium text-[xsContent] text-[16px] line-clamp-5">{{__('form.booking.request')}}</span>
                                                </label>
                                                <textarea name="requestText" placeholder="Type here" class="ant-input css-125enb3" style="resize: none; height: 100px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="w-[154px] mt-8 self-end">
                                                <button class="disabled:bg-black/30 self-end di font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]" type="submit">{{__('button.send')}}</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="flex-1 lg:pl-[20px] ">
                                    <div>
                                        <div class="mx-auto w-full sm:w-formClamp max-w-md bg-white border py-6 px-5 mb-3">
                                            <button class="rounded-none flex w-full justify-between bg-white-100 text-left text-sm font-medium text-dark-900 hover:bg-white-200 focus:outline-none focus-visible:ring focus-visible:ring-white-500/75" id="headlessui-disclosure-button-:rd:" type="button" aria-expanded="false" data-headlessui-state="">
                                                <div class="flex flex-col gap-6">
                                                    <div>
                                                        <p class="text-sm text-xsTitle lantern-hotel-title">LANTERN HOTEL</p>
                                                        <p class="text-xl mb-3 text-xsContent font-medium">Economy No Window</p>
                                                        <p class="text-base text-xsTitle">Phòng Economy No Window nằm ở tầng trệt và tầng 5 với mức giá rất tốt.</p>
                                                    </div>
                                                    <button class="self-start text-[#633511]"><a href="/rooms">{{__('form.booking.retake')}}</a></button>
                                                </div>
                                            </button>
                                        </div>
                                        <div class="mx-auto w-full sm:w-formClamp max-w-md bg-white border py-6 px-5">
                                            <div class="rounded-none flex flex-col w-full justify-between bg-white-100 text-left text-sm font-medium text-dark-900 hover:bg-white-200 focus:outline-none focus-visible:ring focus-visible:ring-white-500/75">
                                                <p class="text-lg font-medium text-xsContent mb-6">{{__('screen.title.bookingdetail')}}</p>
                                                <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                                                    <div>
                                                        <p class="text-[16px] leading-5 font-normal text-xsTitle mb-2">{{__('form.booking.checkin')}}</p>
                                                        <p class="text-[16px] leading-5 font-medium text-xsContent">14-07-2024</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-[16px] leading-5 font-normal text-xsTitle mb-2">{{__('form.booking.checkout')}}</p>
                                                        <p class="text-[16px] leading-5 font-medium text-xsContent">14-07-2024</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-[16px] leading-5 font-normal text-xsTitle mb-2">{{__('form.booking.staylength')}}</p>
                                                        <p class="text-[16px] leading-5 font-medium text-xsContent">0</p>
                                                    </div>
                                                    <div>
                                                        <p class="text-[16px] leading-5 font-normal text-xsTitle mb-2">{{__('form.booking.people')}}</p>
                                                        <p class="text-[16px] leading-5 font-medium text-xsContent">2 {{__('form.booking.rooms')}} 3 {{__('form.booking.adults')}}</p>
                                                    </div>
                                                </div>
                                            </div>
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
@endsection
