@extends('layouts.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Operation</h1>
        <p class="mb-4">Add { $patient->name }} operation record</p>
        <a class="nav-link ml-0" href="forms">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
        <form action="#" method="POST" class="form-horizontal">
            {{ csrf_field() }}


            <div class="card">
                <div class="card-header">
                    <div class="ml-lg-5 mt-sm-3 justify-content-between">
                        <label class="control-label">Name:</label> <input type="text" name="name" style="width: 300px;" value="{ $patient->name }}" disabled> &nbsp;&nbsp;&nbsp;
                        <label class="control-label">Gender:</label> <input type="text" name="nric" style="width: 200px;" value="{ $patient->gender }}" disabled>&nbsp;&nbsp;&nbsp;
                        <label class="control-label">Sex:</label> <input type="text" name="gender" style="width: 60px;" value="{ $patient->mrn }}" disabled><br><br>
                        <label class="control-label">MRN:</label> <input type="text" name="mrn" style="width: 150px;" value="{ $patient->type }}" disabled>
                        <label class="control-label">Height:</label> <input type="text" name="height" style="width: 50px;" value="{ $patient->type }}" disabled>&nbsp;
                        <label class="control-label">Weight:</label> <input type="text" name="weight" style="width: 50px;" value="{ $patient->weight }}" disabled>
                        <label class="control-label">Smoking:</label> <input type="text" name="smoking" style="width: 50px;" value="{ $patient->smoking }}">&nbsp;
                    </div>

                </div>
                <div class="card-body">&nbsp;&nbsp;
                    <div class="ml-lg-5 mt-sm-3 justify-content-between">
                        <label class="custom-control-label">Date:</label> <input type="date" name="date" required>
                        <br><br>

                        <input type="submit" value="SAVE" class="btn btn-primary "/>
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
