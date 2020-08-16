@extends('user_management.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">
<style>
    .card {
        width: 65% !important;
        justify-self: center !important;
        margin-left: 15% !important;
    }
    .col-12, .col-lg-7 {
        padding:0 !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('message') }}
            </div>
    @endif
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Settings</h1>
        <p class="mb-4">{{$user->name }} Details</p>

        <div class="card shadow offset-md-1 col-lg-7">
            <div class="card-header py-3">
{{--                <h6 class="m-0 font-weight-bold text-primary">My Details</h6>--}}
                <h6 class="m-0 font-weight-bold text-primary">Update details</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="boxes ml-lg-5 mt-sm-3 justify-content-between">
{{--                <form action="{{route('setting.update', Auth::user()->id)}}" method="PUT" class="form-horizontal">--}}
{{--                    <a class="nav-link ml-0" href="\settings">--}}
{{--                        <i class="fas fa-fw fa-arrow-circle-left"></i>--}}
{{--                        <span>Back</span>--}}
{{--                    </a>--}}

                    <form action="/settings/{{$user->id}}/update" method="POST" class="form-horizontal">
                        {{--                            {{ csrf_field() }}--}}
                        @csrf
                        @method('GET')

                        <div class="form-inline my-sm-2 m-4 ">
                            <label for="name" class="mr-5 mb-2">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control input-group col-lg-6" name="name" value="{{ $user->name }}">
                        </div>
                        <div class="form-inline my-sm-2 m-4 ">
                            <label for="email" class="mr-5 mb-2">{{ __('Email') }}</label>
                            <input id="email" type="text" class="form-control input-group col-lg-6" name="email" value="{{ $user->email }}">
                        </div>
                        <div class="form-inline my-sm-2 m-4 ">
                            <label for="role" class="mr-sm-5">{{ __(' Role ') }}</label>
                            <select class="form-control animated--fade-in col-lg-6 ml-2 mr-2" name="role" id="role" value="{{ $user->role }}" required>
                                <div class="dropdown-menu text-center">
                                    <option class="dropdown-item" value="consultant">Consultant</option>
                                    <option class="dropdown-item" value="nurse">Nurse</option>
                                </div>
                            </select>
                        </div>
                        <div class="form-inline my-sm-2 m-4 ">
                            <label for="staff_id" class="mr-4">{{ __('Staff ID') }}</label>
                            <input id="staff_id" type="text" class="form-control input-group ml-2 col-lg-6" name="staff_id" value="{{ $user->staff_id }}" required>
                        </div>

                        <div class="offset-md-3 mb-4">
                            <input type="submit" value="UPDATE" class="btn btn-primary mr-1 ml-1 mb-2 mt-sm-2"/>
                            <a href="/users">
                                <div class="btn btn-secondary ">CANCEL</div>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection

