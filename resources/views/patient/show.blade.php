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
        <h1 class="h3 mb-2 text-gray-800">Patients</h1>
        <a class="nav-link ml-0 col-2" href="{{ route('patient.index') }}" >
            <i class="fas fa-fw fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
{{--        <a href="/forms/{{ $patient->id }}" class="d-none float-right d-sm-inline-block btn btn-sm btn-primary shadow-sm">--}}
{{--            <i class="fas fa-plus fa-sm text-white-50"></i> Add New Record</a>--}}
{{--        <h1 class="h3 mb-3 text-gray-800">Add new treatment record</h1>--}}

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

            <!-- Stat Doses, Premedication, Oral, Infusion -->
            <div class="card-body col-xs-6" >
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
                            </tr>
                            </thead>
                            <tbody>
                            <tbody class="text-md-center">
{{--                            @foreach($statdoses as $statdose)--}}
{{--                                <tr>--}}
{{--                                    <td>{ $statdose->drug_name }}</td>--}}
{{--                                    <td>{ $statdose->date }}</td>--}}
{{--                                    <td>{ $statdose->time }}</td>--}}
{{--                                    <td>{ $statdose->dose_value }} { $infusion->dose_unit }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
                            <tr>
                                <td>Paracetamol</td>
                                <td>2020-06-18</td>
                                <td>20:49:42</td>
                                <td>500 mg</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

{{--                <h6 class="m-0 font-weight-bold text-primary">Premedication</h6>--}}
{{--                <div class="my-sm-3 ml-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead class="text-md-center">--}}
{{--                            <tr>--}}
{{--                                <th>Drug name</th>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Time</th>--}}
{{--                                <th>Route</th>--}}
{{--                                <th>Dose</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            --}}{{----}}{{--                                    @foreach($premedications as $$premedication)--}}
{{--                            <tr>--}}
{{--                                <td>{ $premedications->drug_name }}</td>--}}
{{--                                <td>{ $premedications->date }}</td>--}}
{{--                                <td>{ $premedications->time }}</td>--}}
{{--                                <td>{ $premedications->route }}</td>--}}
{{--                                <td>{ $premedications->dose_value }} { $infusion->dose_unit }}</td>--}}
{{--                            </tr>--}}
{{--                            --}}{{----}}{{--                                    @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <h6 class="m-0 font-weight-bold text-primary">Oral</h6>--}}
{{--                <div class="my-sm-3 ml-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead class="text-md-center">--}}
{{--                            <tr>--}}
{{--                                <th>Drug name</th>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Time</th>--}}
{{--                                <th>Dose</th>--}}
{{--                                <th>Frequency</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody>--}}
{{--                            --}}{{----}}{{--                                    @foreach($orals as $oral)--}}
{{--                            <tr>--}}
{{--                                <td>{ $oral->drug_name }}</td>--}}
{{--                                <td>{ $oral->date }}</td>--}}
{{--                                <td>{ $oral->time }}</td>--}}
{{--                                <td>{ $oral->dose_value }} { $infusion->dose_unit }}</td>--}}
{{--                                <td>{ $oral->frequency }} { $infusion->duration }}</td>--}}
{{--                            </tr>--}}
{{--                            --}}{{----}}{{--                                    @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <h6 class="m-0 font-weight-bold text-primary">Infusion</h6>--}}
{{--                <div class="my-sm-3 ml-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead class="text-md-center">--}}
{{--                            <tr>--}}
{{--                                <th>Drug name</th>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Time</th>--}}
{{--                                <th>Dose</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="text-md-center">--}}
{{--                            --}}{{----}}{{--                                    @foreach($infusions as $infusion)--}}
{{--                            <tr>--}}
{{--                                <td>{ $infusion->drug_name }}</td>--}}
{{--                                <td>{ $infusion->date }}</td>--}}
{{--                                <td>{ $infusion->time }}</td>--}}
{{--                                <td>{ $infusion->dose_value }} { $infusion->dose_unit }}</td>--}}
{{--                            </tr>--}}
{{--                            --}}{{----}}{{--                                    @endforeach--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Injection, Operation, Charts, Inhalation -->
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
                            </tr>
                            </thead>
{{--                            <tbody class="text-md-center">--}}
{{--                            @foreach($injections as $injection)--}}
{{--                                <tr>--}}
{{--                                    <td>{ $injection->drug_name }}</td>--}}
{{--                                    <td>{ $injection->treatment }}</td>--}}
{{--                                    <td>{ $injection->time }}</td>--}}
{{--                                    <td>{ $injection->dose_value }} { $injection->dose_unit }}</td>--}}
{{--                                    <td>{ $injection->route }}</td>--}}
{{--                                </tr>--}}
{{--                            @endforeach--}}
{{--                            </tbody>--}}
                            <tbody class="text-md-center">
                            <tr>
                                <td>Cyclophosphamide</td>
                                <td>2019-08-13</td>
                                <td>13:45:12</td>
                                <td>15 ml</td>
                                <td>S/C</td>
                            </tr>
                            <tr>
                                <td>Doxorubicin</td>
                                <td>2020-05-03</td>
                                <td>08:20:30</td>
                                <td>20 ml</td>
                                <td>S/C</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

{{--                <h6 class="m-0 font-weight-bold text-primary">Operation</h6>--}}
{{--                <div class="my-sm-3 ml-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead class="text-md-center">--}}
{{--                            <tr>--}}
{{--                                <th>Date</th>--}}
{{--                                <th>Time</th>--}}
{{--                                <th>Operation</th>--}}
{{--                                <th>Anaesthetist</th>--}}
{{--                                <th>Diet Order</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="text-md-center">--}}
{{--                            --}}{{----}}{{--                                    @foreach($operations as $operation)--}}
{{--                            <tr>--}}
{{--                                <td>{ $operation->treatment }}</td>--}}
{{--                                <td>{ $operation->time }}</td>--}}
{{--                                <td>{ $operation->operation }}</td>--}}
{{--                                <td>{ $operation->anasthetist }}</td>--}}
{{--                                <td>{ $operation->diet }}</td>--}}
{{--                                --}}{{----}}{{--                                    @endforeach--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

{{--                <h6 class="m-0 font-weight-bold text-primary">Charts</h6>--}}
{{--                <div class="my-sm-3 ml-0">--}}
{{--                    <div class="table-responsive">--}}
{{--                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                            <thead class="text-md-center">--}}
{{--                            <tr>--}}
{{--                                <th>Treatment</th>--}}
{{--                                <th>IV Infusion</th>--}}
{{--                                <th>Diet Order</th>--}}
{{--                                <th>Chart</th>--}}
{{--                            </tr>--}}
{{--                            </thead>--}}
{{--                            <tbody class="text-md-center">--}}
{{--                            --}}{{----}}{{--                                    @foreach($inhalations as $inhalation)--}}
{{--                            <tr>--}}
{{--                                <td>{ $inhalation->treatment }}</td>--}}
{{--                                <td>{ $inhalation->iv_infusion }}</td>--}}
{{--                                <td>{ $inhalation->diet }}</td>--}}
{{--                                <td>{ $inhalation->chart_img }} { $inhalation->dose_unit }}</td>--}}
{{--                                --}}{{----}}{{--                                    @endforeach--}}
{{--                            </tr>--}}
{{--                            </tbody>--}}
{{--                        </table>--}}
{{--                    </div>--}}
{{--                </div>--}}

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
                            </tr>
                            </thead>
                            <tbody class="text-md-center">
                            <tr>
                                <td>Ventolin</td>
                                <td>2019-08-13</td>
                                <td>16:45:12</td>
                                <td>20 mg</td>
                                <td>PO</td>
                            </tr>
                            <tr>
                                <td>Ventolin</td>
                                <td>2020-05-03</td>
                                <td>08:20:30</td>
                                <td>30 mg</td>
                                <td>S/C</td>
                            </tbody>
{{--                            <tbody class="text-md-center">--}}
{{--                            --}}{{--                                    @foreach($inhalations as $inhalation)--}}
{{--                            <tr>--}}
{{--                                <td>{ $inhalation->name }}</td>--}}
{{--                                <td>{ $inhalation->date }}</td>--}}
{{--                                <td>{ $inhalation->time }}</td>--}}
{{--                                <td>{ $inhalation->dose_value }} { $inhalation->dose_unit }}</td>--}}
{{--                                <td>{ $inhalation->frequency }} for { $inhalation->duration }}</td>--}}
{{--                            </tr>--}}
{{--                            --}}{{--                                    @endforeach--}}
{{--                            </tbody>--}}
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

@section('scripts')

@endsection
