@extends('layouts.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Stat Doses</h1>
        <p class="mb-4">Insert drug usage record</p>

        <form action="{{route('stat_doses.update', $patient->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}


            <div class="card">
                <div class="card-header">Edit {{ $patient->name }} Details</div>
                <br><br>
                <div class="card-body">
                    {{--                            <label class="control-label">ID</label> <input type="text" name="id" class="form-control">--}}


                        <label class="control-label">Name:</label> <input type="text" name="name" style="width: 300px;" value="{{ $patient->name }}"> &nbsp;&nbsp;&nbsp;
                        <label class="control-label">NRIC:</label> <input type="text" name="NRIC" style="width: 200px;" value="{{ $patient->gender }}">&nbsp;&nbsp;&nbsp;
                        <label class="control-label">Sex:</label> <input type="text" name="Sex" style="width: 60px;" value="{{ $patient->mrn }}"><br><br>
                        <label class="control-label">MRN:</label> <input type="text" name="MRN" style="width: 150px;" value="{{ $patient->type }}">
                        <label class="control-label">Height:</label> <input type="text" name="Height" style="width: 50px;" value="{{ $patient->height }}">&nbsp;
                        <label class="control-label">Weight:</label> <input type="text" name="Weight" style="width: 50px;" value="{{ $patient->weight }}">
                        <label class="control-label">Cancer Type:</label> <input type="text" name="Cancer" style="width: 90px;" value="{{ $patient->bmi }}">
                        <label class="control-label">BMI:</label> <input type="text" name="BMI" style="width: 50px;" value="{{ $patient->smoking }}">&nbsp;&nbsp;&nbsp;
                        <label class="control-label">Smoking:</label> <input type="text" name="Smoking" style="width: 40px;" value=" {{ $patient->year }}">
                        <br><br>

                        <input type="submit" value="SAVE" class="btn btn-primary"/>

                </div>
            </div>
        </form>

    </div>
    <!-- End of Main Content -->

    <a href="{{route('stat_doses.index')}}"><button type="button" class="backbtn">⬅</button></a>

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
