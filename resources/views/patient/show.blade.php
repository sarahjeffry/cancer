@extends('patient.partials.main')

@yield('style')

<style>
    th {
        color: #3d3e47 !important;
    }
    a:hover {
        text-decoration: none !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Patients</h1>
        <a class="nav-link ml-0 col-2" href="{{ route('patients.index') }}" >
            <i class="fas fa-fw fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
    </div>
            <div class="mb-4 col form-inline ">
{{--                <div class="col-xl-5 col-lg-5">--}}
                    <div class="card shadow ml-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Patient</h6>
                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="col-auto ml-sm-3 align-top">
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">Name:</span>
                                    <strong class="ml-2 text-capitalize">{{$patient->name}}</strong>
                                </div>
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">MRN:</span>
                                    <strong class="ml-2 text-uppercase">{{ $patient->patient_id }}</strong>
                                </div>
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">Gender:</span>
                                    <strong class="ml-2 text-capitalize">{{ $patient->gender }}</strong>
                                </div>
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">Cancer type:</span>
                                    <strong class="ml-2 text-capitalize">{{ $patient->type }}</strong>
                                </div>
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">Height:</span>
                                    <strong class="ml-2">{{ $patient->height }} m</strong>
                                </div>
                                <div class="form-inline my-sm-3 ml-0">
                                    <span class="col-form-label mr-lg-3 mr-lg-3">Weight:</span>
                                    <strong class="ml-2">{{ $patient->weight }} Kg</strong>
                                </div>
                            </div>
                        </div>
                    </div>
{{--                </div>--}}

                <!-- Small Card -->
                <div class="card shadow ml-4  align-top">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Treatment</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body ">
                        <div class="col-auto ml-sm-3 align-top">
                            <h6 class="m-0 font-weight-bold text-gray-900">Stat Doses</h6>
                            <div class="form-inline my-sm-3 ml-0">

                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="text-md-center">
                                        <tr>
                                            <th>ID</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                        {{$statdoses->date}}--}}
                                        @foreach($statdoses as $statdose)
                                            <tr>
                                                <td  class="text-md-center text-capitalize">{{$statdose->id}}</td>
                                                <td class="text-md-center">
                                                    <a href="{{ route('patients.show', $patient->id) }}" class=" ">
                                                        <button type="submit" class="btn btn-info">VIEW</button>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="offset-md-5 my-sm-3 mb-4">
{{--                    <a href="{{ url('form') }}">--}}
{{--                        <button type="submit" class="btn btn-secondary">EDIT</button>--}}
{{--                    </a>--}}
                    <a href="/forms">
                        <button type="submit" class="btn btn-primary">ADD NEW RECORD</button>
                    </a>
                </div>
            </div>

@endsection

@section('scripts')

@endsection
