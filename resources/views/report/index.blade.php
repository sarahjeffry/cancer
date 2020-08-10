@extends('report.partials.main')

@yield('style')
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
    <style>
        th {
            color: #3d3e47 !important;
        }
    </style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Report</h1>
        <p class="mb-4">History of all patients</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients List</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Status</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Active</th>
                            <th>Status</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->gender}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->mrn}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->type}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->status}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->live}}</td>
                                <td class="text-md-center" >{{$patient->year}}</td>
                                <td class="text-md-center" ><a href="{{ route('patients.show', $patient->mrn) }}">
                                        <button type="submit" class="btn btn-info">VIEW</button>
                                    </a></td>
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

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>

    <script>
        $(document).ready(function() {
            var table = $('#dataTable').DataTable({
                searchPanes: true
            });
            table.searchPanes.container().prependTo(table.table().container());
        });
    </script>
@endsection
