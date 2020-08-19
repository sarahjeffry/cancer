@extends('layouts.main')

@yield('style')
<link rel="stylesheet" href="{{ asset('css/calendar.css') }}">
<style>
    .eid {
        border-radius: 0px !important;
    }
    .icon {
        font-size: 17px !important;
    }
</style>
@section('content')

        @if(Auth::user()->role == 'admin')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                </div>

                <!-- Content Row -->
                <div class="row offset-0">

                    <!-- Total Number of Patients -->
                    <div class="col-lg-4 col-md- mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Number of Active Patients</div>
                                        <div class="row no-gutters align-items-center">
                                            <div class="col-auto">
                                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$active}}/{{$totalpatients}}</div>
                                            </div>
                                            <div class="col">
                                                {{--                                                <div class="progress progress-sm mr-2">--}}
                                                {{--                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>--}}
                                                {{--                                                </div>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Registered Consultants -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Registered Consultants</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{$consultants}}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Registered Nurses -->
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Registered Nurses</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $nurses }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-user-nurse fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
{{--                    <div class="col-xl-3 col-md-6 mb-4">--}}
{{--                        <div class="card border-left-warning shadow h-100 py-2">--}}
{{--                            <div class="card-body">--}}
{{--                                <div class="row no-gutters align-items-center">--}}
{{--                                    <div class="col mr-2">--}}
{{--                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>--}}
{{--                                        <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-auto">--}}
{{--                                        <i class="fas fa-comments fa-2x text-gray-300"></i>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                </div>

                <!-- DataTales -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users Status</h6>
                    </div>
                    <div class="card-body col-sm-11 ml-lg-5">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-md-center">
                                <tr>
                                    <th>Name</th>
                                    <th>Staff ID</th>
                                    <th>Role</th>
                                    <th>Last Online</th>
                                </tr>
                                </thead>
{{--                                <tfoot class="text-md-center">--}}
{{--                                <tr>--}}
{{--                                    <th>Name</th>--}}
{{--                                    <th>Staff ID</th>--}}
{{--                                    <th>Role</th>--}}
{{--                                    <th>Last Online</th>--}}
{{--                                </tr>--}}
{{--                                </tfoot>--}}
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td class="text-md-center" style="text-transform: uppercase;">{{$user->staff_id}}</td>
                                        <td class="text-md-center" style="text-transform: capitalize;">{{$user->role}}</td>
                                        <td class="text-md-center" >{{$user->last_online_at->diffForHumans()}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        @endif

        @if(Auth::user()->role == 'consultant')

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Dashboard</h1>
                <p class="mb-4">Visualizations of patients in iCancer</p>
                <!-- Content Row -->
                <span class="form-inline" >
                    <div class="col-6" >
                        <!-- Area Charts -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Trend</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-bar">
                                    <canvas id="trends" width="225" height="120"></canvas>
                                </div>
                                <hr>
                                <center>Rate of cancer deaths by years</center>
                            </div>
                        </div>
                    </div>

                            <!-- Donut Charts -->
                    <div class="col-6" >
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Demographic</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body ">
                                <div class="chart-pie justify-content-center">
                                    <canvas id="demographic" width="89" height="40" class="ml-sm-2"></canvas>
                                </div>
                                <hr>
                                <center>Number of cancer occurences in 2020</center>
                            </div>
                        </div>
                    </div>
                </span>
                <!-- Bar Charts -->
                <div class="col-lg-10 offset-1" >
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Correlation</h6>
                        </div>
                        <div class="card-body">
                            <div class="chart-area">
                                {{--                            <canvas id="myAreaChart"></canvas>--}}
                                <canvas id="correlation" width="290" height="90"></canvas>
                            </div>
                            <hr>
                            <center>Number of lung cancer occurences amongst smokers and non-smokers</center>
                        </div>
                    </div>
                </div>
            </div>
    <!-- End of Main Content -->
        @endif

        @if(Auth::user()->role == 'nurse')
            <!-- Page Heading -->
{{--            <div class="d-sm-flex align-items-center justify-content-between mb-4">--}}
{{--                <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>--}}
{{--            </div>--}}
            <div class="container py-5">
                <!-- Calendar -->
                <div class="calendar shadow bg-white p-md-5 offset-md-1" style="width: 75%; height: 70%;">
                    <div class="d-flex icon align-items-center mb-3 "><i class="mb-3 fa fa-calendar fa-3x mr-3"></i>
                        <h2 class="month font-weight-bold text-uppercase">August 2020</h2>
                    </div>
{{--                    <p class="font-italic text-muted mb-5">No events for this day.</p>--}}
                    <ol class="day-names list-unstyled">
                        <li class="font-weight-bold text-uppercase">Sun</li>
                        <li class="font-weight-bold text-uppercase">Mon</li>
                        <li class="font-weight-bold text-uppercase">Tue</li>
                        <li class="font-weight-bold text-uppercase">Wed</li>
                        <li class="font-weight-bold text-uppercase">Thu</li>
                        <li class="font-weight-bold text-uppercase">Fri</li>
                        <li class="font-weight-bold text-uppercase">Sat</li>
                    </ol>

                    <ol class="days list-unstyled">
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li><div class="date">1</div><div class="event all-day eid bg-success">Eid al-Adha</div></li>
                        <li><div class="date">2</div><div class="event all-day end bg-success">Eid al-Adha</div></li>
                        <li><div class="date">3</div></li>
                        <li><div class="date">4</div></li>
                        <li><div class="date">5</div></li>
                        <li><div class="date">6</div></li>
                        <li><div class="date">7</div></li>
                        <li><div class="date">8</div></li>
                        <li><div class="date">9</div></li>
                        <li><div class="date">10</div></li>
                        <li><div class="date">11</div></li>
                        <li><div class="date">12</div></li>
                        <li><div class="date">13</div>
{{--                            <div class="event all-day begin span-2 bg-warning">Event Name</div>--}}
                        </li>
                        <li><div class="date">14</div></li>
                        <li><div class="date">15</div></li>
                        <li><div class="date">16</div></li>
                        <li><div class="date">17</div></li>
                        <li><div class="date">18</div></li>
                        <li><div class="date">19</div></li>
                        <li><div class="date">20</div><div class="event all-day bg-info">Awwal Muharram</div></li>
                        <li><div class="date">21</div></li>
                        <li><div class="date">22</div></li>
                        <li><div class="date">23</div></li>
                        <li><div class="date">24</div></li>
                        <li><div class="date">25</div></li>
                        <li><div class="date">26</div></li>
                        <li><div class="date">27</div></li>
                        <li><div class="date">28</div></li>
                        <li><div class="date">29</div></li>
                        <li><div class="date">30</div></li>
                        <li><div class="date">31</div><div class="event bg-primary">Malaysia Independence Day</div></li>
                        <li class="outside"><div class="date">1</div></li>
                        <li class="outside"><div class="date">2</div></li>
                        <li class="outside"><div class="date">3</div></li>
                        <li class="outside"><div class="date">4</div></li>
                        <li class="outside"><div class="date">5</div></li>
                    </ol>
                </div>
            </div>
        @endif



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
                    data: [ {{ $patientbreast20 }}, {{ $patientlung20 }},{{ $patientpancreas20 }}, {{ $patientskin20 }}],
                    // data: [2,4,6,3],
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

                    <!-- Page level plugins -->
                    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
                    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

                    <!-- Page level custom scripts -->
                    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
                    <script>
                        $(document).ready( function () {
                            $('.table').DataTable();
                        } );
                    </script>
@endsection
