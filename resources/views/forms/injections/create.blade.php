@extends('forms.partials.main')

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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Injection</h1>
        <p class="mb-4">Add { $patient->name }} injection record</p>
        <a class="nav-link ml-0" href="forms">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
        <form action="#" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="card shadow offset-md-1 col-lg-10">
                <div class="card-header">
                    <div class="ml-lg-5 mt-sm-3 justify-content-between">
                        <span class="form-inline mb-sm-4">
                            <label class="control-label mb-3">Name:</label> <input type="text" name="name" class="form-control ml-3 mr-4" style="width: 300px;" value="{ $patient->name }}" disabled>
                            <label class="control-label ml-3 ">Gender:</label> <input type="text" name="gender" class="form-control ml-3 mr-4" style="width: 200px;" value="{ $patient->gender }}" disabled>&nbsp;
                            <label class="control-label">MRN:</label> <input type="text" name="mrn" class="form-control ml-3 mr-4" style="width: 150px;" value="{ $patient->mrn }}" disabled>
                        </span>
                        <span class="form-inline mb-sm-3">
                            <label class="control-label">Cancer Type:</label> <input type="text" name="type" class="form-control ml-3 mr-4" value="{ $patient->type }}" disabled>
                            <label class="control-label">Height:</label> <input type="text" name="height" class="form-control ml-3 mr-4" style="width: 80px;" value="{ $patient->type }} m" disabled>&nbsp;
                            <label class="control-label">Weight:</label> <input type="text" name="weight" class="form-control ml-3 mr-4" style="width: 80px;" value="{ $patient->weight }} Kg" disabled>
                            <label class="control-label">Smoking:</label> <input type="text" name="smoking" class="form-control ml-3 mr-4" style="width: 70px;" value="{ $patient->smoking }}" disabled>&nbsp;
                        </span>
                    </div>

                </div>

                <div class="card-body ml-sm-4 form-inline">&nbsp;&nbsp;
                    <div class="mt-sm-3 justify-content-between">
                        <div class="form-inline mb-sm-4">
                            <label class="control-label mb-1 ml-3">Date prescribed: </label> <input type="date" name="date" class="form-control ml-3 mr-4" style="width: 150px;">
                            <label class="control-label ml-3 ">Time:</label> <input type="time" name="time" class="form-control ml-2 mr-4" style="width: 150px;">&nbsp;
                            <label class="control-label">Route:</label>
                            <select required class="form-control animated--fade-in  ml-2 mr-4" name="route" id="route" style="width: 75px;">
                                <div class="dropdown-menu text-center">
                                    <option class="dropdown-item" value="IV">IV</option>
                                    <option class="dropdown-item" value="PO">PO</option>
                                    <option class="dropdown-item" value="IM">IM</option>
                                    <option class="dropdown-item" value="S/C">S/C</option>
                                </div>
                            </select>
                        </div>
                        <div class="form-inline mb-sm-4">
                            <label class="control-label ml-3 ">Drug name:</label> <input type="text" name="drugname" class="form-control ml-2 mr-4" style="width: 320px;">
                            <label class="control-label ml-3 ">Dose:</label> <input type="number" name="dose" class="form-control ml-2 mr-4" style="width: 90px;">
                            <select required class="form-control animated--fade-in  mr-2" name="unit" id="unit" style="width: 80px;">
                                <div class="dropdown-menu text-center">
                                    <option class="dropdown-item" value="mcg">mcg</option>
                                    <option class="dropdown-item" value="mg">mg</option>
                                    <option class="dropdown-item" value="g">g</option>
                                    <option class="dropdown-item" value="ml">ml</option>
                                </div>
                            </select>
                        </div>

                        <div class="form-inline mt-2 offset-md-6 mb-lg-2">
                            <input type="submit" value="SAVE" class="btn btn-primary"/>
                            <a href="forms">
                                <div class="btn btn-secondary ml-3">CANCEL</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->
@section('scripts')

@endsection
