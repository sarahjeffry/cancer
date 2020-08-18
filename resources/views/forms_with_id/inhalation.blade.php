@extends('patient.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

<style>
    .col-lg-10 {
        padding:0 !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Inhalation</h1>
        <p class="mb-4">Add {{ $patient->name }} inhalation record</p>
        <a class="nav-link ml-0" href="/forms/{{ $patient->id }}">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Change form</span>
        </a>
        <form action="/inhalation/{{$patient->id}}/store" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            @method('GET')
            <div class="card shadow offset-md-1 col-lg-10">
                <div class="card-header">
                    <div class="ml-lg-5 mt-sm-3 justify-content-between">
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
                <div class="form-inline justify-content-around">
                    <div class="mt-sm-3 justify-content-between">
                        <div class="form-inline mb-sm-4 mt-sm-3">
                            <label class="control-label mb-1">Date prescribed: </label> <input type="date" name="date" class="form-control ml-3 mr-4" style="width: 180px;" required>
                            <label class="control-label ml-3 ">Time:</label> <input type="time" name="time" class="form-control ml-2 mr-4" style="width: 150px;" required>&nbsp;
                            <label class="control-label">Drug name:</label> <input type="text" name="drug_name" class="form-control ml-2 mr-4" style="width: 250px;" required>
                        </div>
                        <div class="form-inline mb-sm-4">
                            <label class="control-label">Dose:</label> <input type="text" name="dose_value" class="form-control ml-2 mr-2" style="width: 90px;" required>
                            <select required class="form-control animated--fade-in mr-4" name="dose_unit" id="unit" style="width: 80px;">
                                <div class="dropdown-menu text-center">
                                    <option class="dropdown-item" value="mcg">mcg</option>
                                    <option class="dropdown-item" value="mg">mg</option>
                                    <option class="dropdown-item" value="g">g</option>
                                    <option class="dropdown-item" value="ml">ml</option>
                                </div>
                            </select>
                            <label class="control-label">Frequency:</label>
                            <select required class="form-control animated--fade-in ml-3 mr-2" name="frequency" id="frequency" style="width: 110px;">
                                <div class="dropdown-menu text-center" style="width: 90px;">
                                    <option class="dropdown-item" value="once">once</option>
                                    <option class="dropdown-item" value="twice">twice</option>
                                    <option class="dropdown-item" value="8 hours">8 hours</option>
                                    <option class="dropdown-item" value="others">Others</option>
                                </div>
                                <input type="text" class="form-control ml-2 mr-4" name="duration" id="frequency" style='display:none;' required>
                            </select>
                            <label class="control-label ml-2">for</label>
                            <select required class="form-control animated--fade-in ml-3 mr-2" name="duration" id="duration" style="width: 130px;">
                                <div class="dropdown-menu text-center">
                                    <option class="dropdown-item" value="daily">daily</option>
                                    <option class="dropdown-item" value="weekly">weekly</option>
                                    <option class="dropdown-item" value="two weeks">two weeks</option>
                                </div>
                            </select>
                            <input type="text" class="form-control ml-2 mr-4" name="duration" id="duration" style='display:none;'/>
                        </div>

                        <div class="form-inline mt-2 mb-lg-4">
                            <button type="submit" value="SAVE" class="btn btn-primary offset-5">SAVE</button>
                            <a href="/forms/{{ $patient->id }}">
                                <div class="btn btn-secondary ml-2">CANCEL</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End of Main Content -->

{{--    <a href="{{route('stat_doses.index')}}"><button type="button" class="backbtn">⬅</button></a>--}}

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
