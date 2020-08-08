@extends('layouts.main')

@yield('style')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <p class="mb-4">Visualizations of patients recorded in iCancer</p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Trend</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
{{--                            <canvas id="myBarChart"></canvas>--}}
                            <canvas id="trends" width="200" height="90"></canvas>
                        </div>
                        <hr>
                        <center>Rate of cancer deaths by years</center>
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Correlation</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            {{--                            <canvas id="myAreaChart"></canvas>--}}
                            <canvas id="correlation" width="200" height="90"></canvas>
                        </div>
                        <hr>
                        <center>Number of cancer occurences by year</center>
                    </div>
                </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Demographic</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
{{--                            <canvas id="myPieChart"></canvas>--}}
                            <canvas id="demographic" width="120" height="90"></canvas>
                        </div>
                        <hr>
                        <center>Number of cancer occurences in 2020</center>
{{--                        Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts for visualizations -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <!-- Trends visualization -->
    <script src="{{asset('js/demo/chart-area-demo.js')}}"></script>

    <!-- Demographic visualization -->
    <script src="{{asset('js/demo/chart-pie-demo.js')}}"></script>

    <!-- Correlation visualization -->
    <script src="{{asset('js/demo/chart-bar-demo.js')}}"></script>

    <!-- Trends visualization -->
    <script>
        var ctx = document.getElementById('trends').getContext('2d');
        var trends = new Chart(ctx, {
            type: 'line',
            data:
                {
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

    <!-- Demographic visualization -->
    <script>
        var ctx = document.getElementById('demographic').getContext('2d');
        var demographic = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Breast', 'Lung', 'Pancreas', 'Skin'],
                datasets: [{
                    label: 'Number of cancer occurences',
                    data: [12, 19, 3, 5],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]

            }
        });
    </script>

    <!-- Correlation visualization -->
    <script>
        var ctx = document.getElementById('correlation').getContext('2d');
        var trends = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2017', '2018', '2019', '2020'],
                datasets: [{
                    label: 'Breast',
                    data: [12, 19, 6, 3],
                    backgroundColor: [
                        '#FF8DCC',
                        '#FF8DCC',
                        '#FF8DCC',
                        '#FF8DCC'
                    ],
                    borderColor: [
                        '#FE6EBD',
                        '#FE6EBD',
                        '#FE6EBD',
                        '#FE6EBD',
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Lung',
                        data: [2, 29, 25, 15],
                        backgroundColor: [
                            '#6C8DFC',
                            '#6C8DFC',
                            '#6C8DFC',
                            '#6C8DFC'
                        ],
                        borderColor: [
                            '#577CF8',
                            '#577CF8',
                            '#577CF8',
                            '#577CF8'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Pancreas',
                        data: [12, 19, 6, 3],
                        backgroundColor: [
                            '#F8735B',
                            '#F8735B',
                            '#F8735B',
                            '#F8735B'
                        ],
                        borderColor: [
                            '#ED4C2F',
                            '#ED4C2F',
                            '#ED4C2F',
                            '#ED4C2F'
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Skin',
                        data: [2, 29, 25, 15],
                        backgroundColor: [
                            '#58BC74',
                            '#58BC74',
                            '#58BC74',
                            '#58BC74'
                        ],
                        borderColor: [
                            '#32AB54',
                            '#32AB54',
                            '#32AB54',
                            '#32AB54'

                        ],
                        borderWidth: 1
                    }]
            },
            options: {
                tooltips: {
                    mode: 'index',
                }
            },
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
