@extends('admin.layout_admin')

@section('content')
    <div class="space-y-4">
        <h2 class="text-3xl font-bold mb-4">Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-blue-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3v18h18M21 3L3 21M3 3h18v18" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Total Bookings</h3>
                        <p class="text-2xl">150</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-green-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Room Occupancy</h3>
                        <p class="text-2xl">75%</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-yellow-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-3.866 0-7 1.343-7 3s3.134 3 7 3 7-1.343 7-3-3.134-3-7-3z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Revenue</h3>
                        <p class="text-2xl">$25,000</p>
                    </div>
                </div>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="flex items-center">
                    <div class="bg-red-500 p-3 rounded-full">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" />
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold">Pending Check-ins</h3>
                        <p class="text-2xl">10</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full mt-8">
        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
            <div>
                <canvas id="chart_booking"></canvas>
            </div>
            <div>
                <canvas id="chart_room"></canvas>
            </div>

            <div>
                <canvas id="chart_revenue"></canvas>
            </div>

            <div>
                <canvas id="chart_check_in"></canvas>
            </div>
        </div>

    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js'></script>
    <script>
        var dynamicColors = function() {
            var r = Math.floor(Math.random() * 255);
            var g = Math.floor(Math.random() * 255);
            var b = Math.floor(Math.random() * 255);
            var o = 0.9;

            if(r>220 && g>220 && b>220)
            {
                l = 0;
                i = 0;
                n = 0;
                h =0.9;
                return "rgb(" + l + "," + i + "," + n + "," + h +")";
            }

            return "rgb(" + r + "," + g + "," + b + "," + o +")";
        };

        var chart1 = {!! json_encode($chart1) !!};
        var chart2 = {!! json_encode($chart2) !!};
        var chart3 = {!! json_encode($chart3) !!};
        var chart4 = {!! json_encode($chart4) !!};
        var labelses_chart = {!! json_encode($labelses_chart) !!};

        var backgroundColor = [];
        for (let i = 0; i < 6; i++ ) {
            backgroundColor.push(dynamicColors());
        }

        var data_chart1 = {
            labels: labelses_chart,
            datasets: [{
                label: 'Number of bookings',
                data: chart1,
                backgroundColor: backgroundColor,
                borderColor: backgroundColor,
                borderWidth: 1
            }]
        };

        var data_chart2 = {
            labels: labelses_chart,
            datasets: [{
                label: 'Number of cancelled bookings',
                data: chart2,
                backgroundColor: backgroundColor,
                borderColor: backgroundColor,
                borderWidth: 1
            }]
        };

        var data_chart3 = {
            labels: labelses_chart,
            datasets: [{
                label: 'Number of bookings processed',
                data: chart3,
                backgroundColor: backgroundColor,
                borderColor: backgroundColor,
                borderWidth: 1
            }]
        };

        var data_chart4 = {
            labels: labelses_chart,
            datasets: [{
                label: 'Number of unprocessed bookings',
                data: chart4,
                backgroundColor: backgroundColor,
                borderColor: backgroundColor,
                borderWidth: 1
            }]
        };



        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }

        var chart_booking = document.getElementById('chart_booking');
        var chart_room = document.getElementById('chart_room');
        var chart_revenue = document.getElementById('chart_revenue');
        var chart_check_in = document.getElementById('chart_check_in');
        new Chart(chart_booking, {
            type: 'bar',
            data: data_chart1,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new Chart(chart_room, {
            type: 'bar',
            data: data_chart2,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new Chart(chart_revenue, {
            type: 'bar',
            data: data_chart3,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        new Chart(chart_check_in, {
            type: 'bar',
            data: data_chart4,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
@endsection


