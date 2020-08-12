@extends('forms.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">
<style>
    /* Styles for form buttons */
    .forms:hover {
        box-shadow: 0 0.15rem 1.75rem 0 #B0C4DE !important;
    }

    /* Styles for form links hover */
    a:hover {
        text-decoration: none !important;
    }

    .bg-gradient-info {
        background-color: #4e73df !important;
        background-image: linear-gradient(180deg, #6495ED 10%, #4169E1 100%) !important;
        background-size: cover !important;
    }

    .row {
        align-content: center !important;
    }

    .container-fluid {
        width: 100% !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Forms</h1>
        <p class="mb-2">Select type of form</p>

        <div class="row offset-sm-3">
            <!-- Stat Doses -->
            <div class="row-cols-xl-4 col-md-4 mb-3">
                <a href="\statdoses">
                    <div class="card forms h-100 py-2 bg-gradient-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Stat Doses</div>
                                    <div class="text-xl-center text-gray-100 ">Drug usage</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-pencil-alt fa-2x text-gray-100"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Premedication -->
            <div class="row-cols-xl-4 col-md-4 mb-3">
                <a href="premedication">
                    <div class="card forms h-100 py-2 bg-gradient-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Premedication</div>
                                    <div class="text-xl-center text-gray-100 ">Oral intake</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-notes-medical fa-2x text-gray-100"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <div class="row offset-sm-3">
            <!-- Oral -->
            <div class="row-cols-xl-4 col-md-4 mb-3">
                <a href="\oral">
                    <div class="card forms h-100 py-2 bg-gradient-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-white text-center text-uppercase mb-1">Oral</div>
                                    <div class="text-xl-center text-gray-100 ">Oral drug intake</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-check fa-2x text-gray-100"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Infusion -->
            <div class="row-cols-xl-4 col-md-4 mb-3">
                <a href="infusion">
                    <div class="card forms h-100 py-2 bg-gradient-info">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Infusion</div>
                                    <div class="text-xl-center text-gray-100 ">Dose of drugs</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-briefcase-medical fa-2x text-gray-100"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

    <div class="row offset-sm-3">
        <!-- Injection -->
        <div class="row-cols-xl-4 col-md-4 mb-3">
            <a href="injections">
                <div class="card forms h-100 py-2 bg-gradient-info">
                    <div class="btn card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-white text-uppercase mb-1">Injection</div>
                                <div class="text-xl-center text-gray-100 ">Non-oral intake</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-notes-medical fa-2x text-gray-100"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Operation Procedure -->
        <div class="row-cols-xl-4 col-md-4 mb-3">
            <a href="operation">
                <div class="card forms h-100 py-2 bg-gradient-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Operation</div>
                                <div class="text-xl-center text-gray-100 ">Operation Procedure</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-file-medical-alt fa-2x text-gray-100"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>


    <!-- /.container-fluid -->

    </div>
    <div class="row offset-sm-3 ">
        <!-- Treatment Changes Chart -->
        <div class="row-cols-xl-4 col-md-4 mb-3">
            <a href="charts">
                <div class="card forms h-100 py-2 bg-gradient-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Charts</div>
                                <div class="text-xl-center text-gray-100 ">Treatment Changes Charts</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-chart-area fa-2x text-gray-100"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <!-- Inhalation -->
        <div class="row-cols-xl-4 col-md-4 mb-3">
            <a href="inhalation">
                <div class="card forms h-100 py-2 bg-gradient-info">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="h5 mb-0 font-weight-bold text-center text-white text-uppercase mb-1">Inhalation</div>
                                <div class="text-xl-center text-gray-100 ">Inhalation, rectal or topical</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-100"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
