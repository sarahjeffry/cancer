@extends('patient.partials.main')

@yield('style')
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">
<style>
    th {
        color: #3d3e47 !important;
    }
    a:hover {
        text-decoration: none !important;
    }
</style>
@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Patients</h1>
        <p class="mb-4">Active patients</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients Record</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="85%" cellspacing="0">
                        <thead class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td  class="text-md-center text-capitalize">{{$patient->gender}}</td>
                                <td  class="text-md-center text-uppercase">{{$patient->mrn}}</td>
                                <td class="text-md-center text-capitalize">{{$patient->type}}</td>
                                <td class="text-md-center">{{$patient->year}}</td>
                                <td class="text-md-center">
                                    <a href="{{ route('patients.show', $patient->id) }}" class="">
                                        <button type="submit" class="btn btn-info">VIEW</button>
                                    </a>
{{--                                    <a href="{{ route('patients.edit', $patient->id) }}">--}}
{{--                                        <button type="submit" class="btn btn-primary">EDIT</button>--}}
{{--                                    </a>--}}
                                </td>
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
