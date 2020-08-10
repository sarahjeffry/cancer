@extends('forms.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Stat Doses</h1>
        <p class="mb-4">Insert drug usage record</p>
        <a class="nav-link ml-0" href="{{ redirect()->back() }}">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>

{{--        <form action="{{route('stat_doses.create', $patient->mrn)}}" method="POST" class="form-horizontal">--}}
{{--            {{ csrf_field() }}--}}


            <div class="card">
                <div class="card-header">Add { $patient->name }} Stat Dose Record</div>
                <br><br>
                <div class="card-body">
                    {{--                            <label class="control-label">ID</label> <input type="text" name="id" class="form-control">--}}


                        <label class="control-label">Name:</label> <input type="text" name="name" style="width: 300px;" value="{ $patient->name }}"> &nbsp;&nbsp;&nbsp;
                        <label class="control-label">NRIC:</label> <input type="text" name="nric" style="width: 200px;" value="{ $patient->gender }}">&nbsp;&nbsp;&nbsp;
                        <label class="control-label">Sex:</label> <input type="text" name="gender" style="width: 60px;" value="{ $patient->mrn }}" disabled><br><br>
                        <label class="control-label">MRN:</label> <input type="text" name="mrn" style="width: 150px;" value="{ $patient->type }}">
                        <label class="control-label">Height:</label> <input type="text" name="height" style="width: 50px;" value="{ $patient->height }}">&nbsp;
                        <label class="control-label">Weight:</label> <input type="text" name="weight" style="width: 50px;" value="{ $patient->weight }}">
                        <label class="control-label">BMI:</label> <input type="text" name="bmi" style="width: 50px;" value="{ $patient->smoking }}">&nbsp;&nbsp;&nbsp;
                        <label class="custom-control-label">Date:</label> <input type="datetime-local" name="date" disabled>
                        <br><br>

                        <input type="submit" value="SAVE" class="btn btn-primary"/>

                </div>
            </div>
{{--        </form>--}}
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
