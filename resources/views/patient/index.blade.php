@extends('layouts.main')

@yield('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Patients</h1>
        <p class="mb-4">List of active patients</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients Record</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="85%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
{{--                            <th>Type</th>--}}
                            <th>Active</th>
                            <th>Status</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
{{--                            <th>Type</th>--}}
                            <th>Active</th>
                            <th>Status</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <th>{{$patient->name}}</th>
                                <th style="text-transform: capitalize;">{{$patient->gender}}</th>
                                <th style="text-transform: uppercase;">{{$patient->mrn}}</th>
{{--                                <th style="text-transform: capitalize;">{{$patient->type}}</th>--}}
                                <th style="text-transform: capitalize;">{{$patient->status}}</th>
                                <th style="text-transform: capitalize;">{{$patient->live}}</th>
                                <th>{{$patient->year}}</th>
                                <a href="{{ route('patients.index', $patient->mrn) }}">
                                    <button type="submit" class="btn btn-info">VIEW</button>
                                </a>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@section('scripts')

    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>

{{--    <script>--}}
{{--        $(document).ready(function() {--}}
{{--            $('#user_table').DataTable({--}}
{{--                processing: true,--}}
{{--                serverSide: true,--}}
{{--                ajax: {--}}
{{--                  url: "{{ route('patient.index')  }}",--}}
{{--                },--}}
{{--                columns: [--}}
{{--                    {--}}
{{--                        data: 'name',--}}
{{--                        name: 'Name'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'gender',--}}
{{--                        name: 'Gender'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'mrn',--}}
{{--                        name: 'MRN'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'status',--}}
{{--                        name: 'Active'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'live',--}}
{{--                        name: 'Status'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'year',--}}
{{--                        name: 'Year'--}}
{{--                    },--}}
{{--                    {--}}
{{--                        data: 'action',--}}
{{--                        name: 'action',--}}
{{--                        orderable: false--}}
{{--                    }--}}
{{--                ]--}}
{{--            })--}}
{{--        });--}}
{{--    </script>--}}
@endsection
