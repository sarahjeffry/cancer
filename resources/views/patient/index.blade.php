@extends('patient.partials.main')

@yield('style')
<!-- DataTables Bootstrap CSS -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


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
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <a href="{{ route('patients.show', $patient->id) }}" class=" ">
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

@push('js')
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>
@endpush
