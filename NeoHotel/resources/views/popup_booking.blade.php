<div class="fixed z-50 bottom-0 booking-wrapper w-full bg-[#633511] backdrop-blur-lg ">
	<div class="h-5 sm:h-full flex max-w-[1080px] m-auto items-center justify-center gap-5 py-6 px-4">
		<div class="hidden sm:block w-full">
			<form class="w-full grid sm:grid-flow-col sm:grid-rows-1 gap-3">
                <div class="flex-[1 1 340px] min-w-[195px]">
                    <div class="w-full h-11 ">
                        <input type="text" id="date-range-picker" name="booking_dates" class="border border-white bg-[#633511] hover:bg-[#7E502C] text-[#E6E6E6] bg-[#633511] w-full px-4 py-2">
                    </div>
                </div>
				<div class="flex-[1 1 340px] min-w-[140px] relative">
					<button type="button" class="flex !justify-start border font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]">
						<p class="text-[#E6E6E6] text-base font-normal leading-tight">Khách hàng</p>
					</button>
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
						<path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
					</svg>
				</div>
				<div class="flex-[1 1 165px] min-w-[155px] relative ">
					<button type="button" class="border flex !justify-start font-medium	leading-tight flex justify-center w-full h-11 px-4 py-3 text-white bg-[#633511] hover:bg-[#7E502C]">
						<p class="text-[#E6E6E6] text-base font-normal leading-tight lantern-hotel-title">LANTERN HOTEL</p>
					</button>
					<svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg" class="absolute right-2 top-6 transform -translate-y-1/2" style="fill: white;">
						<path d="M6.00002 8.25C5.95077 8.25005 5.902 8.24037 5.8565 8.22151C5.811 8.20266 5.76968 8.175 5.7349 8.14013L1.9849 4.39013C1.83837 4.24359 1.83837 4.00631 1.9849 3.85988C2.13143 3.71344 2.36871 3.71334 2.51515 3.85988L6.00002 7.34475L9.4849 3.85988C9.63143 3.71334 9.86871 3.71334 10.0151 3.85988C10.1616 4.00641 10.1617 4.24369 10.0151 4.39013L6.26515 8.14013C6.23037 8.175 6.18905 8.20266 6.14355 8.22151C6.09805 8.24037 6.04927 8.25005 6.00002 8.25Z"></path>
					</svg>
				</div>
				<div class="flex-[1 1 155px] min-w-[100px]"><button type="submit" class="rounded-none w-full h-11 bg-[#FFFF] hover:bg-[#DBB98E] text-yellow-900 text-base font-medium">Đặt phòng</button></div>
			</form>
		</div>
		<div class="sm:hidden w-full">
			<div><button class="p-4 w-full"><span class="text-white font-medium">{{__('button.booknow')}}</span></button></div>
		</div>
	</div>
</div>
