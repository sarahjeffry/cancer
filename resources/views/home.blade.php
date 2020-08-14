@extends('layouts.main')

@yield('style')


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Home</h1>
        <p class="mb-4">Description here</p>
    </div>
    <!-- /.container-fluid -->

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-8 col-lg-7">

            <!-- Area Charts -->
            <div class="card shadow mb-2">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Demographic</h6>
                </div>
                <div class="card-body"style="height: 470px; width: 350px;">
                    <div class="chart-area" >
                        <canvas id="trends" style="height: 380px; width: 400px;"></canvas>
                    </div>
                    <hr>
                    <center>Number of cancer occurences by year</center>
                </div>
            </div>

            <!-- Bar Charts -->
{{--            <div class="card shadow mb-4">--}}
{{--                <div class="card-header py-3">--}}
{{--                    <h6 class="m-0 font-weight-bold text-primary">Bar Charts</h6>--}}
{{--                </div>--}}
{{--                <div class="card-body">--}}
{{--                    <div class="chart-bar">--}}
{{--                        <canvas id="myBarChart"></canvas>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}

        <!-- Donut Charts -->
{{--        <div class="col-xl-4 col-lg-5">--}}
{{--            <div class="card shadow mb-4">--}}
{{--                <!-- Card Header - Dropdown -->--}}
{{--                <div class="card-header py-3">--}}
{{--                    <h6 class="m-0 font-weight-bold text-primary">Donut Charts</h6>--}}
{{--                </div>--}}
{{--                <!-- Card Body -->--}}
{{--                <div class="card-body">--}}
{{--                    <div class="chart-pie pt-4">--}}
{{--                        <canvas id="myPieChart"></canvas>--}}
{{--                    </div>--}}
{{--                    <hr>--}}
{{--                    Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

@endsection

@section('scripts')
    <script src="{{asset('https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Charts.min.js')}}"></script>
    <script>
        var ctx = document.getElementById('trends').getContext('2d');
        var trends = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['2017', '2018', '2019', '2020'],
                datasets: [
                    {
                        label: 'Breast',
                        data: [22, 26, 25, 32],
                        backgroundColor: '#FF8DCC',
                        borderColor: '#E555A4',
                        fill: false,
                        borderWidth: 2
                    },
                    {
                        label: 'Lung',
                        data: [25, 39, 45, 43],
                        fill: false,
                        backgroundColor: '#6C8DFC',
                        borderColor: '#3B60DC',
                        borderWidth: 2,
                        lineTension:0.1
                    },
                    {
                        label: 'Pancreas',
                        data: [12, 29, 25, 15],
                        fill: false,
                        backgroundColor: '#FF693C',
                        borderColor: '#B13C19',
                        borderWidth: 2,
                        lineTension:0.1
                    },
                    {
                        label: 'Skin',
                        data: [10, 13, 10, 12],
                        fill: false,
                        backgroundColor: '#70BE86',
                        borderColor: '#44B264',
                        borderWidth: 2,
                        lineTension:0.1
                    }]
            },
            options: {
                tooltips: {
                    mode: 'index',
                }
            }
        });
    </script>
@endsection
