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
                            <th>Date admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td  class="text-md-center text-capitalize">{{$patient->gender}}</td>
                                <td  class="text-md-center text-uppercase">{{$patient->patient_id}}</td>
                                <td class="text-md-center text-capitalize">{{$patient->type}}</td>
                                <td class="text-md-center text-uppercase">{{$patient->date_in}}</td>
                                <td class="text-md-center">
                                    <a href="/patients/{{$patient->id}}/show">
                                        <button type="submit" class="btn btn-info">VIEW</button>
                                    </a>
                                    @if(Auth::user()->role == 'admin')
                                        <a class=" shadow animated--grow-in" aria-labelledby="userDropdown" href="{{ route('patient.destroy', $patient->id) }}" data-toggle="modal" data-target="#deleteModal">
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                        </a>
                                    @endif
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
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete {{$patient->name}}?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                {{--            <div class="modal-body">Are you sure you want to delete the record?</div>--}}
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    {{--                <a class="btn btn-primary" href="/logout">Logout</a>--}}
                    {{--                <a class="btn btn-danger" href="{{ route('settings.destroy', $user->id) }}"--}}
                    <a class="btn btn-danger" href="#"
                       onclick="event.preventDefault();
                   document.getElementById('delete-form').submit();">
                        {{ __('Delete') }}

                        <form id="delete-form" action="#" method="DELETE" style="display: none;">
                            @csrf
                        </form>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')

    <!-- Page level plugins -->
    <script src="{{asset('vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/demo/datatables-demo.js')}}"></script>
    <script>
        $(document).ready( function () {
            $('.table').DataTable();
        } );
    </script>
@endpush
