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
        <h1 class="h3 mb-2 text-gray-800">Charts</h1>
        <a class="nav-link ml-0" href="\forms">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Change form</span>
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
                            <th>Date admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot class="text-md-center">
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->patient_id}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->type}}</td>
                                <td class="text-md-center" >{{$patient->date_in}}</td>
                                <td class="text-md-center">
                                    {{--                                    <form action="{{ route('stat_dose.index', $patient->id) }}" method="GET" class="form-horizontal">--}}
                                    {{--                                    <a href="{{ route('stat_dose.index', $patient->id) }}">--}}
                                    <a href="/chart/{{$patient->id}}/update">
                                        <button type="submit" class="btn btn-success">SELECT</button>
                                    </a>
                                    {{--                                    </form>--}}
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
