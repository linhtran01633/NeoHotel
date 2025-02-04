@extends('app_layout')
@section('content')
    @php
        $language = 'en';
        if(__('lang') == 'JP') {
            $language = 'jp';
        } else if(__('lang') == 'VN') {
            $language = 'vn';
        }
    @endphp
    <section class="flex-1 flex flex-col">
        <main class="flex-1 flex flex-col " x-data='{
            appLocale1: @json(app()->getLocale()),
            submit_step1: function() {
                if (this.$refs.bookingForm.checkValidity()) {
                    booking.adult = $("#adult").val()
                    booking.end_date = $("#end_date").val()
                    booking.children = $("#children").val()
                    booking.breakfast = $("#breakfast").val()
                    booking.start_date = $("#start_date").val()
                    booking.number_of_room = $("#number_of_room").val()

                    let date1 = moment($("#end_date").val());
                    let date2 = moment($("#start_date").val());

                    booking.staylength = date1.diff(date2, "days") + 1;

                    localStorage.setItem("booking", JSON.stringify(booking))

                    window.location.href = `/booking?room_type={!!request()->room_type!!}&step=2`
                } else {
                    this.$refs.bookingForm.reportValidity()
                }
            },

            changeRoomType: function() {
                window.location.href = `/booking?room_type=${$("#room_type").val()}&step=1`
            },

            change_end_date : function() {
                booking.end_date = $("#end_date").val()
            },

            change_start_date : function() {
                booking.start_date = $("#start_date").val()
            },

            load: function() {
                let end_date = "";
                let start_date = "";
                if (moment(booking.end_date, "MMM D, YYYY", true).isValid()) {
                    end_date = moment(booking.end_date, "MMM D, YYYY").format("YYYY-MM-DD");
                    start_date = moment(booking.start_date, "MMM D, YYYY").format("YYYY-MM-DD");
                } else if(moment(booking.end_date, "YYYY年MM月DD日", true).isValid()) {
                    end_date = moment(booking.end_date, "YYYY年MM月DD日").format("YYYY-MM-DD");
                    start_date = moment(booking.start_date, "YYYY年MM月DD日").format("YYYY-MM-DD");
                } else {
                    end_date = moment(booking.end_date, "YYYY-MM-DD").format("YYYY-MM-DD");
                    start_date = moment(booking.start_date, "YYYY-MM-DD").format("YYYY-MM-DD");
                }

                if(this.appLocale1 == "ja") {
                    $("#end_date").val(moment(end_date,"YYYY-MM-DD").format("YYYY年MM月DD日"));
                    $("#start_date").val(moment(start_date,"YYYY-MM-DD").format("YYYY年MM月DD日"));
                } else if(this.appLocale1 == "en") {
                    $("#end_date").val(moment(end_date,"YYYY-MM-DD").format("MMM D, YYYY"));
                    $("#start_date").val(moment(start_date,"YYYY-MM-DD").format("MMM D, YYYY"));
                } else {
                    $("#end_date").val(moment(end_date,"YYYY-MM-DD").format("YYYY-MM-DD"));
                    $("#start_date").val(moment(start_date,"YYYY-MM-DD").format("YYYY-MM-DD"));
                }
            },

        }' x-init="load">
            <div class="w-full py-xlClamp bg-F9F9F9">
                <div class="max-width-1080px min-w-60vw m-auto flex flex-col items-center px-smClamp">
                    <div class="relative w-full flex flex-col sm:flex-row justify-center mb-8 gap-y-3">
                        <div class=" top-0 left-0 flex w-fit">
                            <a href="/rooms">
                                <button class="flex m-auto items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" class="self-center" width="20">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5"></path>
                                    </svg>
                                    <div>{{__('button.back')}}</div>
                                </button>
                            </a>
                        </div>
                        <div class="m-auto">
                        <h1 class="flex-1 text-headerClamp justify-center items-center">{{__('form.booking.detail')}}</h1>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="text-red-500 p-2">
                            {{ Session::get('message') }}
                            @php
                                Session::forget('message');
                            @endphp
                        </div>
                    @endif
                    <div class="flex flex-col w-full">
                        <div class="w-full flex gap-6">
                            <div class="font-medium flex flex-col sm:flex-row gap-y-2 max-w-250px  sm:max-w-full text-center">
                                <div class="relative w-12 h-12 flex flex-shrink-0 items-center self-center justify-center rounded-full  w-6 h-6 bg-green-600 text-white"><span class="absolute m-auto text-white">1</span></div>
                                <p class="self-center ml-2">{{__('form.booking.stageone')}}</p>
                            </div>
                            <div class="flex-1">
                                <hr class="bg-4A4A4A data-[orientation=horizontal]:h-px data-[orientation=horizontal]:w-full data-[orientation=vertical]:h-full data-[orientation=vertical]:w-px my-15px">
                            </div>
                            <div class="font-medium flex flex-col sm:flex-row gap-y-2 max-w-250px  sm:max-w-full text-center">
                                <div class="relative w-12 h-12 flex flex-shrink-0 items-center self-center justify-center rounded-full  w-6 h-6 text-gray-600 border border-gray-500 @if($step == 1) bg-white @else bg-green-600 @endif"><span class="absolute m-auto @if($step == 1) text-gray-600 @else text-white @endif ">2</span></div>
                                <p class="self-center ml-2">{{__('form.booking.stagetwo')}}</p>
                            </div>
                        </div>
                        <div class="flex flex-col sm:flex-row justify-between mt-8 ">
                            <div class="flex w-full flex-col sm:flex-row">
                                <div class="w-full sm:w-1/2">
                                    @if ($step == 1)
                                        <form x-ref="bookingForm">
                                            @csrf
                                            <div class="bg-white flex flex-col w-full sm:w-formClamp mb-8 md:mb-0 border py-6 px-smClamp border-neutral-200">
                                                <div class="text-2xl font-medium mb-6">{{__('form.booking.stageone')}}</div>
                                                <div class="flex flex-col gap-6">
                                                    <div class="flex flex-col gap-y-3">
                                                        <label>
                                                            <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.booking.hotelname')}}</span>
                                                            <span class="text-red-600 ml-1">*</span>
                                                        </label>
                                                        <div class="ant-select sc-bdfCDU iknHgW css-125enb3 ant-select-single ant-select-show-arrow" name="hotelName">
                                                            <div class="ant-select-selector">
                                                                <select class="w-full h-44px border border-d9d9d9 px-2">
                                                                    <option value="1">{{__('home.slider.title')}}</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-y-3">
                                                        <label>
                                                            <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.booking.roomtype')}}</span>
                                                            <span class="text-red-600 ml-1">*</span>
                                                        </label>
                                                        <div class="ant-select sc-bdfCDU iknHgW css-125enb3 ant-select-single ant-select-show-arrow">
                                                            <div class="ant-select-selector">
                                                                <select class="w-full h-44px border border-d9d9d9 px-2" x-on:change="changeRoomType" name="room_type" id="room_type" required>
                                                                    @foreach ($categorys as $item)
                                                                        <option value="{{$item->id}}" @if(request()->room_type == $item->id) selected @endif>{!! $item['name_' . $language] !!}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-y-3">
                                                        <label>
                                                            <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.booking.checkin')}}</span>
                                                            <span class="text-red-600 ml-1">*</span>
                                                        </label>
                                                        <div class="ant-picker css-125enb3 sc-eCstZk NZCqe w-full">
                                                            <div class="ant-picker-input">
                                                                <input type="text" class="w-full h-44px border border-d9d9d9 px-2" size="12" x-on:change="change_start_date" id="start_date" name="start_date" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-y-3">
                                                        <label>
                                                            <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.booking.checkout')}}</span>
                                                            <span class="text-red-600 ml-1">*</span>
                                                        </label>
                                                        <div class="ant-picker css-125enb3 sc-eCstZk NZCqe w-full">
                                                            <div class="ant-picker-input">
                                                                <input type="text" class="w-full h-44px border border-d9d9d9 px-2" id="end_date" x-on:change="change_end_date" name="end_date" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="guest-wrapper flex flex-col">
                                                        <div class="font-medium">
                                                            <label class="font-medium">{{__('form.booking.numberofguest')}}</label>
                                                            <span class="text-red-600 ml-1">*</span>
                                                            <p class="text-12px ">{{__('form.booking.desc_guest_field')}}</p>
                                                        </div>
                                                        <div class="flex gap-3">
                                                            <div class="flex flex-col gap-y-3 ">
                                                                <label>
                                                                    <span class="label inline font-medium  text-16px line-clamp-5"></span>
                                                                </label>
                                                                <div class="ant-input-number-group-wrapper sc-dlfmHC jlwJDi css-125enb3">
                                                                    <div class="grid grid-cols-2 gap-0">
                                                                        <div class="w-full">
                                                                            <input type="number" nme="adult" id="adult" x-model="booking.adult" min="1" class="w-full h-44px border border-d9d9d9 px-2" required>
                                                                        </div>
                                                                        <div class="w-full border border-d9d9d9 flex items-center justify-center bg-rgba-0-0-0-0_02">{{__('form.booking.adults')}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="flex flex-col gap-y-3 ">
                                                                <label><span class="label inline font-medium  text-16px line-clamp-5"></span></label>
                                                                <div class="ant-input-number-group-wrapper sc-dlfmHC jlwJDi css-125enb3">
                                                                    <div class="grid grid-cols-2 gap-0">
                                                                        <div class="w-full">
                                                                            <input type="number" name="children" min="0" x-model="booking.children" class="w-full h-44px border border-d9d9d9 px-2" id="children">
                                                                        </div>
                                                                        <div class="w-full border border-d9d9d9 flex items-center justify-center bg-rgba-0-0-0-0_02">{{__('form.booking.children')}}</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-y-3 ">
                                                        <label>
                                                            <span class="label inline font-medium  text-16px line-clamp-5">{{__('bookingbanner.numberofrooms')}}</span>
                                                            <span class="text-red-600 ml-1">*</span>
                                                        </label>
                                                        <div class="full">
                                                            <input type="number" name="number_of_room" id="number_of_room" min="0" x-model="booking.number_of_room"  required class="w-24 h-44px border border-d9d9d9 px-2" >
                                                        </div>
                                                    </div>
                                                    <label class="flex items-center">
                                                        <input class="ant-checkbox-input" type="checkbox" name="breakfast" id="breakfast" x-model="booking.breakfas" value="1" x-bind="booking.breakfas == 1">
                                                        <span>{{__('form.booking.breakfast')}}</span>
                                                    </label>
                                                </div>
                                                <div class="w-154px mt-8 self-end">
                                                    <button type="button" x-on:click="submit_step1()" class="font-medium leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-633511 hover-bg-7E502C">{{__('button.next')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                    @elseif($step == 2)
                                        <form action="{{route('submit-booking')}}" method="post" x-data='{
                                            end_date_custom : "",
                                            start_date_custom : "",
                                            custom_date: function() {
                                                let end_date = moment(booking.end_date, "MMM D, YYYY", true);
                                                let start_date = moment(booking.start_date, "MMM D, YYYY", true);
                                                if (end_date.isValid()) {
                                                 console.log(booking.end_date);
                                                    this.end_date_custom = moment(booking.end_date, "MMM D, YYYY").format("YYYY-MM-DD");
                                                } else {
                                                    this.end_date_custom = moment(booking.end_date, "YYYY-MM-DD").format("YYYY-MM-DD");
                                                }

                                                if (start_date.isValid()) {
                                                    this.start_date_custom = moment(booking.start_date, "MMM D, YYYY").format("YYYY-MM-DD");
                                                } else {
                                                    this.start_date_custom = moment(booking.start_date, "YYYY-MM-DD").format("YYYY-MM-DD");
                                                }

                                            }
                                        }' x-init="custom_date">
                                            @csrf
                                            <input type="text" name="honeypot" style="display:none;">
                                            <input type="hidden" name="hotelName" value="{{__('home.slider.title')}}">
                                            <input type="hidden" name="adult" x-model="booking.adult">
                                            <input type="hidden" name="breakfast" x-model="booking.breakfast">
                                            <input type="hidden" name="children" x-model="booking.children">
                                            <input type="hidden" name="end_date" x-model="end_date_custom">
                                            <input type="hidden" name="number_of_room" x-model="booking.number_of_room">
                                            <input type="hidden" name="room_type"  value="{{request()->room_type}}">
                                            <input type="hidden" name="start_date" x-model="start_date_custom">
                                            <div class="bg-white flex flex-col w-full sm:w-formClamp mb-8 md:mb-0 border py-6 px-smClamp border-neutral-200">
                                            <div class="text-2xl font-medium mb-6">{{__('form.booking.stagetwo')}}</div>
                                            <div class="flex flex-col gap-6">
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.common.firstname')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="c_first_name">
                                                </div>
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.common.lastname')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="text" value="" name="c_last_name">
                                                </div>
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.common.email')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="email" value="" name="c_email">
                                                </div>
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.common.phone')}}</span>
                                                        <span class="text-red-600 ml-1">*</span>
                                                    </label>
                                                    <input placeholder="Type here" required class="ant-input css-125enb3 sc-gsTDqH jWFWON css-125enb3" type="tel" value="" name="c_phone">
                                                </div>
                                                <div class="flex flex-col gap-y-3 ">
                                                    <label>
                                                        <span class="label inline font-medium  text-16px line-clamp-5">{{__('form.booking.request')}}</span>
                                                    </label>
                                                    <textarea name="c_request" placeholder="Type here" class="ant-input css-125enb3" style="resize: none; height: 100px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="w-154px mt-8 self-end">
                                                    <button class="disabled:bg-black/30 self-end di font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-633511 hover-bg-7E502C" type="submit">{{__('button.send')}}</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                                <div class="w-full sm:w-1/2  flex-1 lg-pl-20px">
                                    <div>
                                        <div class="mx-auto w-full sm:w-formClamp max-w-md bg-white border py-6 px-5 mb-3">
                                            <button class="rounded-none flex w-full justify-between bg-white-100 text-left text-sm font-medium text-dark-900 hover:bg-white-200 focus:outline-none focus-visible:ring focus-visible:ring-white-500/75" id="headlessui-disclosure-button-:rd:" type="button" aria-expanded="false" data-headlessui-state="">
                                                <div class="flex flex-col gap-6">
                                                    <div>
                                                        <p class="text-sm  lantern-hotel-title">{{__('home.slider.title')}}</p>
                                                        <p class="text-xl mb-3  font-medium">@if(isset($room_type)) {!! $room_type['name_' . $language] !!} @endif</p>
                                                        <p class="text-base ">@if(isset($room_type)) {!! $room_type['detail_' . $language] !!} @endif</p>
                                                    </div>
                                                    <button class="self-start text-633511"><a href="/rooms">{{__('form.booking.retake')}}</a></button>
                                                </div>
                                            </button>
                                        </div>
                                        @if ($step == 2)
                                            <div class="mx-auto w-full sm:w-formClamp max-w-md bg-white border py-6 px-5">
                                                <div class="rounded-none flex flex-col w-full justify-between bg-white-100 text-left text-sm font-medium text-dark-900 hover:bg-white-200 focus:outline-none focus-visible:ring focus-visible:ring-white-500/75">
                                                    <p class="text-lg font-medium  mb-6">{{__('screen.title.bookingdetail')}}</p>
                                                    <div class="grid grid-cols-2 gap-y-4 gap-x-2">
                                                        <div>
                                                            <p class="text-16px leading-5 font-normal  mb-2">{{__('form.booking.checkin')}}</p>
                                                            <p class="text-16px leading-5 font-medium " x-text="booking.start_date"></p>
                                                        </div>
                                                        <div>
                                                            <p class="text-16px leading-5 font-normal  mb-2">{{__('form.booking.checkout')}}</p>
                                                            <p class="text-16px leading-5 font-medium " x-text="booking.end_date"></p>
                                                        </div>
                                                        <div>
                                                            <p class="text-16px leading-5 font-normal  mb-2">{{__('form.booking.staylength')}}</p>
                                                            <p class="text-16px leading-5 font-medium " x-text="booking.staylength"></p>
                                                        </div>
                                                        <div>
                                                            <p class="text-16px leading-5 font-normal  mb-2">{{__('form.booking.people')}}</p>
                                                            <p class="text-16px leading-5 font-medium "><span  x-text="booking.number_of_room"></span> {{__('form.booking.rooms')}} <span  x-text="booking.adult"></span> {{__('form.booking.adults')}}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
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
