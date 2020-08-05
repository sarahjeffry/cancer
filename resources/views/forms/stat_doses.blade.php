@extends('layouts.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Stat Doses</h1>
        <p class="mb-4">Select a patient</p>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients Record</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <th>{{$patient->name}}</th>
                                <th style="text-transform: uppercase;">{{$patient->mrn}}</th>
                                <th style="text-transform: capitalize;">{{$patient->type}}</th>
                                <th>{{$patient->year}}</th>
                                <th>
                                    <a href="{{ route('stat_doses.create', $patient->mrn) }}">
                                        <button type="submit" class="btn btn-success">SELECT</button>
                                    </a>
                                </th>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
