<div class="fixed z-50 bottom-0 booking-wrapper w-full bg-633511 backdrop-blur-lg " x-data="{
        btn_check_now: function() {

            let dateRange = $('#date-range-picker').val();
            let dates = dateRange.split(' - '); // Tách chuỗi thành mảng hai phần tử

            booking.breakfast = 0;
            booking.adult = Number($('#adult_popup').text()) ? Number($('#adult_popup').text()) : 1;
            booking.children = Number($('#children_popup').text()) ? Number($('#children_popup').text()) : 0;
            booking.number_of_room = Number($('#number_of_room_popup').text()) ? Number($('#number_of_room_popup').text()) : 1;


            let startDate = dates[0] ? moment(dates[0], 'DD/MM/YYYY') : moment();
            let endDate = dates[1] ? moment(dates[1], 'DD/MM/YYYY') : moment();




            // Kiểm tra ngày hợp lệ và tính toán thời gian lưu trú
            if (startDate.isValid() && endDate.isValid()) {
                // Định dạng ngày trước khi lưu vào booking
                booking.start_date = moment(startDate).format('YYYY-MM-DD');
                booking.end_date = moment(endDate).format('YYYY-MM-DD');

                // Tính thời gian lưu trú và bao gồm cả ngày đầu tiên
                booking.staylength = endDate.diff(startDate, 'days') + 1;
            } else {
                // Trường hợp ngày không hợp lệ
                booking.start_date = moment().format('YYYY-MM-DD');
                booking.end_date = moment().format('YYYY-MM-DD');

                booking.staylength = 1; // Thời gian lưu trú tối thiểu là 1 ngày
            }


            localStorage.setItem('booking', JSON.stringify(booking))
            console.log(booking);

            window.location.href = `/rooms`

        },
        load: function() {
            const bookingData = localStorage.getItem('booking');
            if (bookingData) {
                const parsedBooking = JSON.parse(bookingData);
                let startDate = moment(parsedBooking.start_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                let endDate = moment(parsedBooking.end_date, 'YYYY-MM-DD').format('DD/MM/YYYY');
                if (moment(startDate, 'DD/MM/YYYY').isSameOrAfter(moment(), 'day') &&
                    moment(endDate, 'DD/MM/YYYY').isSameOrAfter(moment(), 'day')) {

                    $('#date-range-picker').data('daterangepicker').setStartDate(startDate);
                    $('#date-range-picker').data('daterangepicker').setEndDate(endDate);
                    $('#date-range-picker').val(startDate + ' - ' + endDate);
                } else {
                    let startDateCurent = moment().format('DD/MM/YYYY');
                    let endDateCurent = moment().add(1, 'days').format('DD/MM/YYYY');

                    $('#date-range-picker').data('daterangepicker').setStartDate(startDateCurent);
                    $('#date-range-picker').data('daterangepicker').setEndDate(endDateCurent);
                    $('#date-range-picker').val(startDateCurent + ' - ' + endDateCurent);
                }
            } else {
                let startDate = moment().format('DD/MM/YYYY');
                let endDate = moment().add(1, 'days').format('DD/MM/YYYY');

                $('#date-range-picker').data('daterangepicker').setStartDate(startDate);
                $('#date-range-picker').data('daterangepicker').setEndDate(endDate);
                $('#date-range-picker').val(startDate + ' - ' + endDate);
            }
        }

    }" x-init="load">
	<div class="h-5 sm:h-full flex max-width-1080px m-auto items-center justify-center gap-5 py-6 px-4">
		<div class="hidden sm:block w-full">
			<div class="w-full grid sm:grid-flow-col sm:grid-rows-1 gap-3">
                <div class="flex-1-1-340px min-w-195px">
                    <div class="w-full h-11 ">
                        <input type="text" id="date-range-picker" name="booking_dates" class="border border-white bg-633511 hover-bg-7E502C text-E6E6E6 bg-633511 w-full px-4 py-2">
                    </div>
                </div>
				<div class="flex-1-1-340px min-w-140px relative">
					<button type="button" x-on:click.stop="isPopup = !isPopup" class="flex !justify-start border font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-633511 hover-bg-7E502C">
						<p class="text-E6E6E6 text-base font-normal leading-tight">{{__('bookingbanner.guests')}}</p>
					</button>
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
						<path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
					</svg>

                    <div x-cloak x-show="isPopup" class="absolute z-50 top--210px" @click.away="isPopup = false">
                        <div class="relative">
                            <div class="relative p-4 w-300px bg-white rounded shadow-md">
                                <div class="flex flex-col gap-4">
                                    <div class="flex gap-2">
                                       <div class="font-medium text-xsContent">{{__('bookingbanner.rooms')}}</div>
                                    </div>
                                    <div class="flex justify-between">
                                        <p class="flex-1 self-center">{{__('bookingbanner.numberofrooms')}}</p>
                                        <div class="flex gap-3">
                                            <button class="number_of_room_minus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <span class="text-xsContent w-4 text-center" id="number_of_room_popup">0</span>
                                            <button class="number_of_room_plus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path>
                                        </svg>
                                        <div class="font-medium">{{__('bookingbanner.guests')}}</div>
                                    </div>
                                    <div class="flex justify-between">
                                       <p class="flex-1 self-center">{{__('bookingbanner.adults')}}</p>
                                        <div class="flex gap-3">
                                            <button class="adult_minus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <span class="text-gray-900 w-4 text-center" id="adult_popup">0</span>
                                            <button class="adult_plus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                       <p class="flex-1 self-center">{{__('bookingbanner.children')}}</p>
                                       <div class="flex gap-3">
                                            <button class="children_minus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                            <span class="text-gray-900 w-4 text-center" id="children_popup">0</span>
                                            <button class="children_plus">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" width="20">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
				<div class="flex-1-1-165px min-w-155px relative ">
					<button type="button" class="border flex !justify-start font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-633511 hover-bg-7E502C">
						<p class="text-E6E6E6 text-base font-normal leading-tight lantern-hotel-title">{{__('home.slider.title')}}</p>
					</button>
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
						<path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
					</svg>
				</div>
				<div class="flex-1-1-155px min-w-100px">
                    <button type="button" x-on:click="btn_check_now()" class="rounded-none w-full h-11 bg-FFFF hover-bg-DBB98E text-yellow-900 text-base font-medium">{{__('button.booknow')}}</button>
                </div>
			</div>
		</div>
		<div class="sm:hidden w-full">
			<div>
                <button type="button" x-on:click="btn_check_now()" class="p-4 w-full">
                    <span class="text-white font-medium">{{__('button.booknow')}}</span>
                </button>
            </div>
		</div>
	</div>
</div>



