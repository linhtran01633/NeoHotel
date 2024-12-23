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

   <!-- Thêm CSS của flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- Thêm JavaScript của flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Ngôn ngữ tiếng Anh (mặc định) -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/en.js"></script>

    <!-- Ngôn ngữ tiếng Việt -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vi.js"></script>

    <!-- Ngôn ngữ tiếng Nhật -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/ja.js"></script>


    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@latest/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/app.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.10.2/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=M+PLUS+1p:wght@100;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <style>
        @font-face {
            font-family: 'Cambria';
            src: url('/fonts/Cambria.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
        }

        body {
            font-family: "M PLUS 1p", serif;
            font-weight: normal;
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

        // document.getElementById("datepicker").addEventListener("focus", function(event) {
        //     event.preventDefault(); // Ngừng sự kiện focus mặc định của trình duyệt
        // });

        var formatDate = 'Y-m-d';
        var appLocale = @json(app()->getLocale());
        if(appLocale == 'ja') {
            formatDate = 'Y年m月d日';
        } else if(appLocale == 'en') {
            formatDate = 'M d, Y';
        } else {
            appLocale = 'vi';
        }

        $('#date-range-picker').daterangepicker({
            autoApply: true, // Tự động áp dụng ngày khi chọn xong
            format: formatDate, // Định dạng ngày (có thể thay đổi theo ý muốn)
            showOnFocus: true, // Hiển thị datepicker khi input được focus
            startDate: moment(),
            endDate: moment().add(1, 'days'),
            minDate: moment(),
            opens: 'right',
            drops: 'up',
            locale: {
                format: 'DD/MM/YYYY',  // Định dạng ngày (có thể thay đổi theo yêu cầu)
            }
        });
        document.addEventListener("DOMContentLoaded", function() {
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

            // Khởi tạo flatpickr cho start_date
            flatpickr("#start_date", {
                dateFormat: formatDate,
                locale: appLocale,
                minDate: "today",
                disableMobile: true,
                onChange: function (selectedDates, dateStr, instance) {
                    // Cập nhật minDate của end_date mỗi khi chọn start_date
                    // const endDatePicker = flatpickr("#end_date"); // Lấy đối tượng flatpickr của end_date
                    // endDatePicker.set("minDate", selectedDates[0]);
                    // endDatePicker.set("dateFormat", formatDate);
                    // endDatePicker.set("locale", appLocale);

                    flatpickr("#end_date", {
                        dateFormat: formatDate, // Đảm bảo giữ định dạng cho end_date
                        locale: appLocale, // Giữ ngôn ngữ
                        minDate: selectedDates[0], // Ngày bắt đầu cho end_date là hôm nay
                        disableMobile: true,
                    });

                }

            });

            // Khởi tạo flatpickr cho end_date
            flatpickr("#end_date", {
                dateFormat: formatDate, // Đảm bảo giữ định dạng cho end_date
                locale: appLocale, // Giữ ngôn ngữ
                minDate: "today", // Ngày bắt đầu cho end_date là hôm nay
                disableMobile: true,
                onChange: function (selectedDates, dateStr, instance) {
                    const startDate = flatpickr("#start_date").selectedDates[0];
                    // Kiểm tra xem end_date có nhỏ hơn start_date không
                    if (selectedDates[0] < startDate) {
                        instance.setDate(startDate); // Nếu có, set lại end_date bằng start_date
                        instance.set("dateFormat", formatDate);
                        instance.set("locale", appLocale);
                    }
                }

            });
        });

    </script>
</body>
</html>
