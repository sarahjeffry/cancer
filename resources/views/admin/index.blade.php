@extends('layouts.main')

@yield('style')


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
        <p class="mb-4">Visualizations of patients recorded in iCancer</p>
{{--        <p>{{$breast17}}, {{$breast18}}, {{$breast19}}, {{$breast20}}</p>--}}
        <!-- Content Row -->
        <span class="form-inline" >
            <div class="col-6" >
                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Trend</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="trends" width="195" height="120"></canvas>
                        </div>
                        <hr>
                        <center>Rate of cancer deaths by years</center>
                    </div>
                </div>
            </div>

            <!-- Donut Chart -->
            <div class="col-6" >
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Demographic</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <div class="chart-pie justify-content-center">
                            <canvas id="demographic" width="75" height="40" class="ml-sm-2"></canvas>
                        </div>
                        <hr>
                        <center>Number of cancer occurences in 2020</center>
                    </div>
                </div>
            </div>
        </span>

                <!-- Bar Chart -->
            <div class="col-lg-10 offset-1" >
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Correlation</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                {{--                            <canvas id="myAreaChart"></canvas>--}}
                                <canvas id="correlation" width="250" height="90"></canvas>
                            </div>
                            <hr>
                            <center>Number of lung cancer occurences amongst smokers and non-smokers</center>
                        </div>
                    </div>
            </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts for visualizations -->
@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-pie-demo.js') }}"></script>
    <script src="{{ asset('js/demo/chart-bar-demo.js') }}"></script>

    <!-- Trends visualization -->
    <script>
        var ctx = document.getElementById('trends').getContext('2d');
        var trends = new Chart(ctx, {
            type: 'line',
            data:
                {
                    labels: ['2015','2016','2017', '2018', '2019', '2020'],
                    datasets: [
                        {
                            label: 'Breast',
                            data: [{{ $deadbreast15 }}, {{ $deadbreast16 }}, {{ $deadbreast17 }}, {{ $deadbreast18 }}, {{ $deadbreast19 }}, {{ $deadbreast20 }}],
                            backgroundColor: '#FF8DCC',
                            borderColor: '#E555A4',
                            fill: false,
                            borderWidth: 2
                        },
                        {
                            label: 'Lung',
                            data: [{{ $deadlung15 }}, {{ $deadlung16 }},{{ $deadlung17 }}, {{ $deadlung18 }}, {{ $deadlung19 }}, {{ $deadlung20 }}],
                            fill: false,
                            backgroundColor: '#6C8DFC',
                            borderColor: '#3B60DC',
                            borderWidth: 2
                        },
                        {
                            label: 'Pancreas',
                            data: [{{ $deadpancreas15 }}, {{ $deadpancreas16 }},{{ $deadpancreas17 }}, {{ $deadpancreas18 }}, {{ $deadpancreas19 }}, {{ $deadpancreas20 }}],
                            fill: false,
                            backgroundColor: '#FF693C',
                            borderColor: '#B13C19',
                            borderWidth: 2
                        },
                        {
                            label: 'Skin',
                            data: [{{ $deadskin15 }}, {{ $deadskin16 }}, {{ $deadskin17 }}, {{ $deadskin18 }}, {{ $deadskin19 }}, {{ $deadskin20 }}],
                            fill: false,
                            backgroundColor: '#70BE86',
                            borderColor: '#44B264',
                            borderWidth: 2
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
                    {{--data: [ {{ $patientbreast20 }}, {{ $patientlung20 }},{{ $patientpancreas20 }}, {{ $patientskin20 }}],--}}
                    data: [2,4,6,3],
                    backgroundColor: [
                        '#FF8DCC',
                        '#6C8DFC',
                        '#FF693C',
                        '#70BE86'
                    ],
                    borderColor: [
                        '#E555A4',
                        '#3B60DC',
                        '#B13C19',
                        '#44B264',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                tooltips: {
                    mode: 'index',
                }
            }
        });
    </script>

    <!-- Correlation visualization -->
    <script>
        var ctx = document.getElementById('correlation').getContext('2d');
        var trends = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['2015','2016','2017', '2018', '2019', '2020'],
                datasets: [{
                    label: 'Non-smokers',
                    data: [{{ $notsmoke15 }}, {{ $notsmoke16 }}, {{ $notsmoke17 }}, {{ $notsmoke18 }}, {{ $notsmoke19 }},{{ $notsmoke20 }} ],
                    backgroundColor: [
                        '#6C8DFC',
                        '#6C8DFC',
                        '#6C8DFC',
                        '#6C8DFC',
                        '#6C8DFC',
                        '#6C8DFC'

                    ],
                    borderColor: [
                        '#577CF8',
                        '#577CF8',
                        '#577CF8',
                        '#577CF8',
                        '#577CF8',
                        '#577CF8'
                    ],
                    borderWidth: 1
                },
                    {
                        label: 'Smokers',
                        data: [ {{ $smoke15 }}, {{ $smoke16 }}, {{ $smoke17 }}, {{ $smoke18 }}, {{ $smoke19 }},{{ $smoke20 }}  ],
                        backgroundColor: [
                            '#FF8DCC',
                            '#FF8DCC',
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
                            '#FE6EBD',
                            '#FE6EBD'
                        ],
                        borderWidth: 1
                    },
                    ]
            },
            options: {
                tooltips: {
                    mode: 'index',
                },
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

{{--    <script>--}}
{{--        var ctx = document.getElementById('correlation').getContext('2d');--}}
{{--        var trends = new Chart(ctx, {--}}
{{--            type: 'bar',--}}
{{--            data: {--}}
{{--                labels: ['2015','2016','2017', '2018', '2019', '2020'],--}}
{{--                datasets: [{--}}
{{--                    label: 'Breast',--}}
{{--                    data: [{{ $breast15 }}, {{ $breast16 }},{{ $breast17 }}, {{ $breast18 }}, {{ $breast19 }}, {{ $breast20 }}],--}}
{{--                    backgroundColor: [--}}
{{--                        '#FF8DCC',--}}
{{--                        '#FF8DCC',--}}
{{--                        '#FF8DCC',--}}
{{--                        '#FF8DCC',--}}
{{--                        '#FF8DCC',--}}
{{--                        '#FF8DCC'--}}
{{--                    ],--}}
{{--                    borderColor: [--}}
{{--                        '#FE6EBD',--}}
{{--                        '#FE6EBD',--}}
{{--                        '#FE6EBD',--}}
{{--                        '#FE6EBD',--}}
{{--                        '#FE6EBD',--}}
{{--                        '#FE6EBD',--}}
{{--                    ],--}}
{{--                    borderWidth: 1--}}
{{--                },--}}
{{--                    {--}}
{{--                        label: 'Lung',--}}
{{--                        data: [ {{ $lung15 }}, {{ $lung16 }}, {{ $lung17 }}, {{ $lung18 }}, {{ $lung19 }}, {{ $lung20 }} ],--}}
{{--                        backgroundColor: [--}}
{{--                            '#6C8DFC',--}}
{{--                            '#6C8DFC',--}}
{{--                            '#6C8DFC',--}}
{{--                            '#6C8DFC',--}}
{{--                            '#6C8DFC',--}}
{{--                            '#6C8DFC'--}}
{{--                        ],--}}
{{--                        borderColor: [--}}
{{--                            '#577CF8',--}}
{{--                            '#577CF8',--}}
{{--                            '#577CF8',--}}
{{--                            '#577CF8',--}}
{{--                            '#577CF8',--}}
{{--                            '#577CF8'--}}
{{--                        ],--}}
{{--                        borderWidth: 1--}}
{{--                    },--}}
{{--                    {--}}
{{--                        label: 'Pancreas',--}}
{{--                        data: [ {{ $pancreas15 }}, {{ $pancreas16 }}, {{ $pancreas17 }}, {{ $pancreas18 }}, {{ $pancreas19 }}, {{ $pancreas20 }} ],--}}
{{--                        backgroundColor: [--}}
{{--                            '#F8735B',--}}
{{--                            '#F8735B',--}}
{{--                            '#F8735B',--}}
{{--                            '#F8735B',--}}
{{--                            '#F8735B',--}}
{{--                            '#F8735B'--}}
{{--                        ],--}}
{{--                        borderColor: [--}}
{{--                            '#ED4C2F',--}}
{{--                            '#ED4C2F',--}}
{{--                            '#ED4C2F',--}}
{{--                            '#ED4C2F',--}}
{{--                            '#ED4C2F',--}}
{{--                            '#ED4C2F'--}}
{{--                        ],--}}
{{--                        borderWidth: 1--}}
{{--                    },--}}
{{--                    {--}}
{{--                        label: 'Skin',--}}
{{--                        data: [{{ $skin15 }}, {{ $skin16 }},{{ $skin17 }}, {{ $skin18 }}, {{ $skin19 }}, {{ $skin20 }}],--}}
{{--                        backgroundColor: [--}}
{{--                            '#58BC74',--}}
{{--                            '#58BC74',--}}
{{--                            '#58BC74',--}}
{{--                            '#58BC74',--}}
{{--                            '#58BC74',--}}
{{--                            '#58BC74'--}}
{{--                        ],--}}
{{--                        borderColor: [--}}
{{--                            '#32AB54',--}}
{{--                            '#32AB54',--}}
{{--                            '#32AB54',--}}
{{--                            '#32AB54',--}}
{{--                            '#32AB54',--}}
{{--                            '#32AB54'--}}

{{--                        ],--}}
{{--                        borderWidth: 1--}}
{{--                    }]--}}
{{--            },--}}
{{--            options: {--}}
{{--                tooltips: {--}}
{{--                    mode: 'index',--}}
{{--                },--}}
{{--                scales: {--}}
{{--                    yAxes: [{--}}
{{--                        ticks: {--}}
{{--                            beginAtZero: true--}}
{{--                        }--}}
{{--                    }]--}}
{{--                }--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

@endsection
