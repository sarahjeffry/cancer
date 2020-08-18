@extends('patient.partials.main')

@yield('style')

<style>
    th {
        color: #3d3e47 !important;
    }
    a:hover {
        text-decoration: none !important;
    }
    .col-lg-9, .col-md-10 {
        padding: 0 !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div>
            <h1 class="h3 mb-2 text-gray-800">Patients</h1>
            @if(Auth::user()->role === 'consultant' or  Auth::user()->role === 'nurse')
                <a href="/forms/{{ $patient->id }}" class="d-none float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                    <i class="fas fa-plus fa-sm text-white-50"></i> Add New Record</a>
            @endif
            <br>
            <a class="nav-link ml-0 col-2" href="{{ route('patient.index') }}" >
                <i class="fas fa-fw fa-arrow-circle-left"></i>
                <span>Back</span>
            </a>

        </div>

        <div class="card shadow offset-md-1 col-lg-9 mb-xl-2">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-900">Patient's details</h6>
            </div>
            <div class="form-inline justify-content-around">
                <div class="ml-lg-5 mt-sm-5 mb-xl-3 justify-content-between">
                        <span class="form-inline mb-sm-4">
                            <label class="control-label mb-3">Name:</label> <input type="text" name="name" class="form-control ml-3 mr-4" style="width: 300px;" value="{{ $patient->name }}" disabled>
                            <label class="control-label ml-3">Gender:</label> <input type="text" name="gender" class="form-control ml-3 mr-4 text-capitalize" style="width: 200px;" value="{{ $patient->gender }}" disabled>&nbsp;
                            <label class="control-label ">MRN:</label> <input type="text" name="mrn" class="form-control ml-3 mr-4 text-uppercase" style="width: 150px;" value="{{ $patient->patient_id }}" disabled>
                        </span>
                    <span class="form-inline mb-sm-3">
                            <label class="control-label mr-4">Cancer Type:</label> <input type="text" name="type" class="form-control text-capitalize mr-4" value="{{ $patient->type }}" disabled>
                            <label class="control-label mr-4">Height:</label> <input type="text" name="height" class="form-control mr-4" style="width: 80px;" value="{{ $patient->height }} m" disabled>&nbsp;
                            <label class="control-label mr-4">Weight:</label> <input type="text" name="weight" class="form-control mr-4" style="width: 100px;" value="{{ $patient->weight }} Kg" disabled>
                            <label class="control-label mr-4">Smoking:</label> <input type="text" name="smoking" class="form-control text-capitalize mr-4" style="width: 70px;" value="{{ $patient->smoking }}" disabled>&nbsp;
                        </span>
                </div>
            </div>
        </div>

        <!-- Treatments Card -->
        <div class="card row shadow mt-sm-3 col-md-10" style="margin-left: 5%">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-gray-900">Treatment</h6>
            </div>

            @if (count($statdoses) === 0 and count($premedications) === 0 and count($orals) === 0
                and count($infusions) === 0 and count($injections) === 0 and count($operations) === 0
                and count($inhalations) === 0 and count($charts) === 0 )
                <div class="p-5">
                    <h4>No treatment is recorded for this patient.</h4><br>
                    @if(Auth::user()->role === 'consultant' or  Auth::user()->role === 'nurse')
                    <a href="/forms/{{ $patient->id }}" class="d-none align-content-center d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                        <i class="fas fa-plus fa-sm text-white-50"></i> Add First Record</a>
                    @endif
                </div>

            @endif

            <div class="p-5 justify-content-around">
                @if (count($statdoses) > 0)
                    <h6 class="m-0 font-weight-bold text-primary">Stat Doses</h6>
                    <div class="my-sm-3 ml-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-md-center">
                                <tr>
                                    <th>Drug name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Dose</th>
                                    <th>Prescribed by</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tbody class="text-md-center text-capitalize">
                                @foreach($statdoses as $statdose)
                                    <tr>
                                        <td>{{ $statdose->drug_name }}</td>
                                        <td>{{ $statdose->date }}</td>
                                        <td>{{ $statdose->time }}</td>
                                        <td>{{ $statdose->dose_value }} {{ $statdose->dose_unit }}</td>
                                        <td>{{ $statdose->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if (count($premedications) > 0)
                    <h6 class="m-0 font-weight-bold text-primary">Premedication</h6>
                    <div class="my-sm-3 ml-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-md-center">
                                <tr>
                                    <th>Drug name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Route</th>
                                    <th>Dose</th>
                                    <th>Prescribed by</th>
                                </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                @foreach($premedications as $premedication)
                                    <tr>
                                        <td>{{ $premedications->drug_name }}</td>
                                        <td>{{ $premedications->date }}</td>
                                        <td>{{ $premedications->time }}</td>
                                        <td>{{ $premedications->route }}</td>
                                        <td>{{ $premedications->dose_value }} {{ $infusion->dose_unit }}</td>
                                        <td>{{ $premedication->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if (count($orals) > 0)
                    <h6 class="m-0 font-weight-bold text-primary">Oral</h6>
                    <div class="my-sm-3 ml-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-md-center">
                                <tr>
                                    <th>Drug name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Dose</th>
                                    <th>Frequency</th>
                                    <th>Prescribed by</th>
                                </tr>
                                </thead>
                                <tbody class="text-capitalize">
                                @foreach($orals as $oral)
                                    <tr>
                                        <td>{{ $oral->drug_name }}</td>
                                        <td>{{ $oral->date }}</td>
                                        <td>{{ $oral->time }}</td>
                                        <td>{{ $oral->dose_value }} {{ $infusion->dose_unit }}</td>
                                        <td>{{ $oral->frequency }} for {{ $infusion->duration }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

                @if (count($infusions) > 0)
                    <h6 class="m-0 font-weight-bold text-primary">Infusion</h6>
                    <div class="my-sm-3 ml-0">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead class="text-md-center">
                                <tr>
                                    <th>Drug name</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Dose</th>
                                    <th>Prescribed by</th>
                                </tr>
                                </thead>
                                <tbody class="text-md-center text-capitalize">
                                @foreach($infusions as $infusion)
                                    <tr>
                                        <td>{{ $infusion->drug_name }}</td>
                                        <td>{{ $infusion->date }}</td>
                                        <td>{{ $infusion->time }}</td>
                                        <td>{{ $infusion->dose_value }} {{ $infusion->dose_unit }}</td>
                                        <td>{{ $infusion->name }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            <!-- Injection, Operation, Charts, Inhalation -->
                @if (count($injections) > 0)
                    <div class="card-body col-xs-6">
                        <h6 class="m-0 font-weight-bold text-primary">Injection</h6>
                        <div class="my-sm-3 ml-0">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead class="text-md-center">
                                    <tr>
                                        <th>Drug name</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>Dose</th>
                                        <th>Route</th>
                                        <th>Prescribed by</th>
                                    </tr>
                                    </thead>
                                    <tbody class="text-md-center text-capitalize">
                                    @foreach($injections as $injection)
                                        <tr>
                                            <td>{{ $injection->drug_name }}</td>
                                            <td>{{ $injection->treatment }}</td>
                                            <td>{{ $injection->time }}</td>
                                            <td>{{ $injection->dose_value }} {{ $injection->dose_unit }}</td>
                                            <td>{{ $injection->route }}</td>
                                            <td>{{ $injection->name }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if (count($operations) > 0)
                            <h6 class="m-0 font-weight-bold text-primary">Operation</h6>
                            <div class="my-sm-3 ml-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-md-center">
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Operation</th>
                                            <th>Anaesthetist</th>
                                            <th>Diet Order</th>
                                            <th>Prescribed by</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-md-center text-capitalize">
                                        @foreach($operations as $operation)
                                            <tr>
                                                <td>{{ $operation->date }}</td>
                                                <td>{{ $operation->time }}</td>
                                                <td>{{ $operation->operation }}</td>
                                                <td>{{ $operation->anaesthetist }}</td>
                                                <td>{{ $operation->diet }}</td>
                                                <td>{{ $operation->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if (count($charts) > 0)
                            <h6 class="m-0 font-weight-bold text-primary">Charts</h6>
                            <div class="my-sm-3 ml-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-md-center">
                                        <tr>
                                            <th>Treatment</th>
                                            <th>IV Infusion</th>
                                            <th>Diet Order</th>
                                            <th>Chart</th>
                                            <th>Staff Name</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-md-center text-capitalize">
                                        @foreach($charts as $chart)
                                            <tr>
                                                <td>{{ $chart->treatment }}</td>
                                                <td>{{ $chart->iv_infusion }}</td>
                                                <td>{{ $chart->diet }}</td>
                                                <td>{{ $chart->chart_img }}</td>
                                                <td>{{ $chart->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                        @if (count($inhalations) > 0)
                            <h6 class="m-0 font-weight-bold text-primary">Inhalation</h6>
                            <div class="my-sm-3 ml-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-md-center">
                                        <tr>
                                            <th>Drug name</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Dose</th>
                                            <th>Frequency</th>
                                            <th>Prescribed by</th>
                                        </tr>
                                        </thead>
                                        <tbody class="text-md-center text-capitalize">
                                        @foreach($inhalations as $inhalation)
                                            <tr>
                                                <td>{{ $inhalation->drug_name }}</td>
                                                <td>{{ $inhalation->date }}</td>
                                                <td>{{ $inhalation->time }}</td>
                                                <td>{{ $inhalation->dose_value }} {{ $inhalation->dose_unit }}</td>
                                                <td>{{ $inhalation->frequency }} for {{ $inhalation->duration }}</td>
                                                <td>{{ $inhalation->name }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif

                    </div>
        </div>

    </div>


@endsection

@section('scripts')

@endsection
