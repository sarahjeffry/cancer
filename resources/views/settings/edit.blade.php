@extends('settings.partials.main')

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

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Settings</h1>
        <p class="mb-4">{{ Auth::user()->name }} Details</p>

        <div class="card shadow offset-md-1 col-lg-7">
            <div class="card-header py-3">
{{--                <h6 class="m-0 font-weight-bold text-primary">My Details</h6>--}}
                <h6 class="m-0 font-weight-bold text-primary">Update details</h6>
            </div>
            <div class="card-body">
{{--                <form action="{{route('setting.update', Auth::user()->id)}}" method="PUT" class="form-horizontal">--}}
{{--                    <a class="nav-link ml-0" href="\settings">--}}
{{--                        <i class="fas fa-fw fa-arrow-circle-left"></i>--}}
{{--                        <span>Back</span>--}}
{{--                    </a>--}}
                    <div class="card-body col-12">
                        <div class="form-inline my-sm-2 m-4 ">
                            <label for="name" class="mr-3">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control input-group col-lg-6" name="name" value="{{ Auth::user()->name }}">

                            <label for="role" class="ml-3 mr-2">{{ __('Role') }}</label>
                            <div class="ml-2">
                                <select id="role" class="dropdown-select form-control input-group text-md-right mr-lg-3" name="role" value="{{ Auth::user()->role }}" >
                                    <option value="Consultant">Consultant</option>
                                    <option value="Nurse">Nurse</option>
                                </select>
                            </div>
                        </div>

                        <form action="{{route('setting.update', Auth::user()->id)}}" method="PATCH" class="form-horizontal">
                            {{ csrf_field() }}
                            <div class="offset-md-6 form-inline my-sm-3 m-4">

                                <label for="email" class="text-md-right mr-3">{{ __('Email') }}</label>
                                <input id="email" type="text" class="form-control input-group col-lg-5" name="email" value="{{ Auth::user()->email }}">

                                <label for="password" class="text-md-right mr-3 ml-3">{{ __('Password') }}</label>
                                <input id="password" type="password" class="form-control input-group col-4" name="email" >
                            </div>

                            <div class="offset-md-4 mb-4">
                                <input type="submit" value="UPDATE" class="btn btn-primary mr-1 ml-3 mb-2 mt-sm-2"/>
                                <a href="/settings">
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

