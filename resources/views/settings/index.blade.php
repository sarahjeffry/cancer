@extends('settings.partials.main')

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
        @if(session()->has('message'))
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('message') }}
            </div>
    @endif


        <!-- Page Heading -->
        <h1 class="h3 mb-5 text-gray-800">Settings</h1>

        <div class="card shadow offset-2 col-lg-7">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Details</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="boxes ml-lg-5 mt-sm-3 justify-content-between">
                    <div class="row ml-sm-3">
                        <div class="form-inline offset-md-2 my-sm-3">
                            <label for="name" class="text-md-right mr-lg-2">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control input-group" name="name" value="{{ Auth::user()->name }}" disabled>
                        </div>
                        <br>
{{--                        <div class="form-inline offset-md-2 my-sm-3" >--}}
{{--                            <label for="role" class="text-md-right mr-lg-3">{{ __('Role') }}</label>--}}
{{--                            <input id="role" type="text" class="form-control input-group" name="role" style="text-transform: capitalize;" value="{{ Auth::user()->role }}" disabled>--}}
{{--                        </div>--}}

                        <div class="form-inline offset-md-2 my-sm-3">
                            <label for="email" class="text-md-right mr-lg-3">{{ __('Email') }}</label>
                            <input id="email" type="text" class="form-control input-group" name="email" value="{{ Auth::user()->email }}" disabled>
                        </div>
                    </div>
                    <div class="offset-4 my-sm-3 mb-4">
                        <a href="/settings/{{Auth::user()->id}}/edit">
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection

