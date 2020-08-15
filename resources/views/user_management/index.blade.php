@extends('user_management.partials.main')

<!-- Styles -->

@yield('styles')
<style>
    .boxes {
        position: relative;
        margin-left: auto;
        width: 100%;
        display: flex;
        flex-direction: column;
    }

    .col-lg-7 {
        padding:0 !important;
    }
</style>

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ session()->get('message') }}
                </div>
            @endif

            <h1 class="h3 mb-3 text-gray-800">User Management</h1>
            <a href="new" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i> Add New User</a>
        </div>

        <!-- DataTales -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Users</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Staff ID</th>
                            <th>Role</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$user->staff_id}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$user->role}}</td>
                                <td class="text-md-center" >{{$user->email}}</td>
                                <td class="text-md-center">
                                   <a href="{{ route('setting.edit', $user->id) }}" >
                                      <button type="submit" class="btn btn-warning mr-2 ">EDIT</button>
                                   </a>
                                  <a class=" shadow animated--grow-in" aria-labelledby="userDropdown" href="/users/{{$user->id}}/destroy" data-toggle="modal" data-target="#deleteModal">
                                     <button type="submit" class="btn btn-danger">DELETE</button>
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
    <!-- /.container-fluid -->

@endsection
<!-- Logout Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure you want to delete ({{$user->id}}) {{$user->name}}?</h5>
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

                    <form id="delete-form" action="{{route('setting.destroy', $user->id)}}" method="DELETE" style="display: none;">
                        @csrf
                    </form>
                </a>
            </div>
        </div>
    </div>
</div>

@push('scripts')

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

