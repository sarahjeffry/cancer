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
                                    <strong class="ml-2 text-uppercase">{{ $patient->mrn }}</strong>
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
                        <div class="col ml-sm-3">
                            <div class="form-inline offset-md-2 my-sm-3">
                                <label for="name" class="text-md-right mr-lg-2">{{ __('Name') }}</label>
                                <input id="name" type="text" class="form-control input-group" name="name" value="{{ '$name' }}" disabled>
                            </div>
                            <br>
                            <div class="form-inline offset-md-2 my-sm-3" >
                                <label for="mrn" class="text-md-right mr-lg-3">{{ __('MRN') }}</label>
                                <input id="mrn" type="text" class="form-control input-group text-capitalize" name="mrn" value="{{ '$mrn' }}" disabled>
                            </div>
                            <br>
                            <div class="form-inline offset-md-2 my-sm-3">
                                <label for="type" class="text-md-right mr-lg-3">{{ __('Cancer type') }}</label>
                                <input id="type" type="text" class="form-control input-group" name="type" value="{{ '$type' }}" disabled>
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
