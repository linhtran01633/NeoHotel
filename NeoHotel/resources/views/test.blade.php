<!DOCTYPE html>
<html>
<head>
    <title>Laravel with Ant Design</title>

</head>
<body>
    <div id="example"></div>
    <div>
    </div>

    <input type="text" id="date-range-picker" name="booking_dates" class="form-input w-full px-4 py-2 mb-4 rounded border-gray-300">

    <script>
            // check if element is available to bind ITS ONLY ON HOMEPAGE
            console.log('currentDate ', currentDate);

            // , function(start, end, label) {
            //     var selectedStartDate = start.format('YYYY-MM-DD'); // selected start
            //     var selectedEndDate = end.format('YYYY-MM-DD'); // selected end

            //     console.log('selectedStartDate' , selectedStartDate);

            //     $checkinInput = $('.datepickerBegin');
            //     $checkoutInput = $('.datepickerEnd');

            //     // Updating Fields with selected dates
            //     $checkinInput.val(selectedStartDate);
            //     $checkoutInput.val(selectedEndDate);

            //     // Setting the Selection of dates on calender on CHECKOUT FIELD (To get this it must be binded by Ids not Calss)
            //     var checkOutPicker = $checkoutInput.data('daterangepicker');
            //     checkOutPicker.setStartDate(selectedStartDate);
            //     checkOutPicker.setEndDate(selectedEndDate);

            //     // Setting the Selection of dates on calender on CHECKIN FIELD (To get this it must be binded by Ids not Calss)
            //     var checkInPicker = $checkinInput.data('daterangepicker');
            //     checkInPicker.setStartDate(selectedStartDate);
            //     checkInPicker.setEndDate(selectedEndDate);
            // });
    </script>
</body>
</html>
