<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Lantern hotel - Vision</title>

    <!-- Ant Design CSS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <link href="https://unpkg.com/tailwindcss@^2.0/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Gothic+A1:wght@100;200;300;400;500;600;700;800;900&display=swap');

        body {
            font-family: "Gothic A1", sans-serif;
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
            room_type: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).room_type : '',
            start_date: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).start_date : '',
            number_of_room: localStorage.getItem('booking') ? JSON.parse(localStorage.getItem('booking')).number_of_room : '',
        },
        closePopup(e) {
            if (this.isPopup && !this.$refs.popup.contains(e.target)) {
                this.isPopup = false;
            }
        }
    }" x-on:click="closePopup($event)">
        @yield('content')
    </div>

    @yield('scripts')
    <script>
        $('#date-range-picker').daterangepicker({
            autoApply: true, // Tự động áp dụng ngày khi chọn xong
            format: 'dd/mm/yyyy', // Định dạng ngày (có thể thay đổi theo ý muốn)
            showOnFocus: true, // Hiển thị datepicker khi input được focus
            startDate: new Date(), // Ngày bắt đầu mặc định là ngày hiện tại
            minDate: new Date(), // Giới hạn ngày nhỏ nhất là ngày hiện tại
            opens: 'right',
            drops: 'up'
        });

        $('.btn-check_now').on('click', function(e){
            window.location.href = '/rooms';
        })
    </script>
</body>
</html>
