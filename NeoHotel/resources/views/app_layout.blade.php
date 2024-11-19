<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lantern hotel - Vision</title>
    <!-- font family -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p&family=Noto+Serif:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <!-- Ant Design CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <style>
        @font-face {
            font-family: 'Cambria';
            src: url('/fonts/Cambria.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }
        body {
            /* font-family: "M PLUS 1p", serif; */
            font-family: "M PLUS 1p", serif;
            font-style: normal;
        }
        .swiper-container {
            width: 100%;
            height: 100%;
        }
        .main-slider {
            width: 100%;
            height: 500px; /* Đặt chiều cao tùy ý cho slide chính */
        }
        .thumb-slider {
            width: 100%;
            height: 100px; /* Đặt chiều cao tùy ý cho slide thumbnail */
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div  x-data="{
        isPopup: false,
        booking : {
            adult: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).adult : '',
            end_date: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).end_date : '',
            children: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).children : '',
            breakfast: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).breakfast : '',
            start_date: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).start_date : '',
            staylength: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).staylength : '0',
            number_of_room: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).number_of_room : '',
        },
    }">
        @yield('content')
    </div>

    @yield('scripts')
    <script>
        $('#date-range-picker').daterangepicker({
            autoApply: true, // Tự động áp dụng ngày khi chọn xong
            format: 'DD/MM/YYYY', // Định dạng ngày (có thể thay đổi theo ý muốn)
            showOnFocus: true, // Hiển thị datepicker khi input được focus
            startDate: new Date(), // Ngày bắt đầu mặc định là ngày hiện tại
            minDate: new Date(), // Giới hạn ngày nhỏ nhất là ngày hiện tại
            opens: 'right',
            drops: 'up',
            locale: {
                format: 'DD/MM/YYYY', // Cấu hình lại định dạng trong locale
            }
        });



        $('.adult_minus').on('click', function(e){
            let adult = (Number($('#adult_popup').text()) ? Number($('#adult_popup').text()) : 0) - 1;

            if(adult < 0) adult = 0;

            $('#adult_popup').text(adult);
        })

        $('.adult_plus').on('click', function(e){
            let adult = (Number($('#adult_popup').text()) ? Number($('#adult_popup').text()) : 0) + 1;

            if(adult < 0) adult = 0;

            $('#adult_popup').text(adult);
        })


        $('.children_minus').on('click', function(e){
            let children = (Number($('#children_popup').text()) ? Number($('#children_popup').text()) : 0) - 1;

            if(children < 0) children = 0;

            $('#children_popup').text(children);
        })

        $('.children_plus').on('click', function(e){
            let children = (Number($('#children_popup').text()) ? Number($('#children_popup').text()) : 0) + 1;

            if(children < 0) children = 0;

            $('#children_popup').text(children);
        })

        $('.number_of_room_minus').on('click', function(e){
            let number_of_room = (Number($('#number_of_room_popup').text()) ? Number($('#number_of_room_popup').text()) : 0) - 1;

            if(number_of_room < 0) number_of_room = 0;

            $('#number_of_room_popup').text(number_of_room);
        })

        $('.number_of_room_plus').on('click', function(e){
            let number_of_room = (Number($('#number_of_room_popup').text()) ? Number($('#number_of_room_popup').text()) : 0) + 1;

            if(number_of_room < 0) number_of_room = 0;

            $('#number_of_room_popup').text(number_of_room);
        })

    </script>
</body>
</html>
