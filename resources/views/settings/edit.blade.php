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
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Settings</h1>
{{--        <p class="mb-4">Edit {{ Auth::user()->name }} Details</p>--}}

        <div class="card shadow">
            <div class="card-header py-3">
{{--                <h6 class="m-0 font-weight-bold text-primary">My Details</h6>--}}
                <h6 class="m-0 font-weight-bold text-primary">Edit {{ Auth::user()->name }} Details</h6>
            </div>
            <div class="card-body">
                <form action="{{route('setting.update', Auth::user()->id)}}" method="PUT" class="form-horizontal">
                    {{ csrf_field() }}
                    <a class="nav-link ml-0" href="\settings">
                        <i class="fas fa-fw fa-arrow-circle-left"></i>
                        <span>Back</span>
                    </a>
                    <div class="card-body col-sm-11 ml-lg-5">
                        <div class="form-inline row my-sm-2 m-4">
                            <label for="name" class="text-md-right mr-lg-3">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control input-group" name="name" value="{{ Auth::user()->name }}" required>
                        </div>

                        <div class="offset-md-6 form-inline my-sm-3 m-4" >
                            <label for="role" class="text-md-right mr-lg-3">{{ __('Role') }}</label>
                            <div class="col-md-6">
                                <select id="role" class="dropdown-select form-control input-group text-md-right mr-lg-3" name="role" value="{{ Auth::user()->role }}"  required>
                                    <option value="Consultant">Consultant</option>
                                    <option value="Nurse">Nurse</option>
                                </select>
                            </div>
                        </div>

                        <div class="offset-md-6 form-inline my-sm-3 m-4">
                            <label for="email" class="text-md-right mr-lg-3">{{ __('Email') }}</label>
                            <input id="email" type="text" class="form-control input-group" name="email" value="{{ Auth::user()->email }}"  required>
                        </div>
                    </div>
                    <div class="offset-md-5 my-sm-3 mb-4">
                        <input type="submit" value="UPDATE" class="btn btn-primary mr-4 mb-2 mt-sm-2"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection

