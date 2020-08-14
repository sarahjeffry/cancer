@extends('forms.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">
<style>
    th {
        color: #4d4d4c !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Injections</h1>
{{--        <p class="mb-4">Select a patient</p>--}}
        <a class="nav-link ml-0" href="forms">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
        <div class="card shadow mb-4">
            <div class="card-header col py-3">
                <h6 class="m-0 font-weight-bold text-primary">Select a patient</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot class="text-md-center">
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
                                <td>{{$patient->name}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->patient_id}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->type}}</td>
                                <td class="text-md-center" >{{$patient->year}}</td>
                                <td class="text-md-center">
                                    <a href="{{ route('stat_doses.update', $patient->patient_id) }}">
                                        <button type="submit" class="btn btn-success">SELECT</button>
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
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection
