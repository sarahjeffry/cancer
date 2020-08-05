@extends('layouts.main')

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
</style>

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Settings</h1>
        <p class="mb-4">My Details</p>

        <div class="boxes">
            <div class="row ml-sm-3 justify-content-center col col-md-11 ">
                <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3 m-4">
                    <label for="name" class="text-md-right mr-lg-3">{{ __('Name') }}</label>
                    <input id="name" type="text" class="form-control input-group" name="name" value="{{ Auth::user()->name }}" disabled>
                </div>

                <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3 m-4" >
                    <label for="role" class="text-md-right mr-lg-3">{{ __('Role') }}</label>
                    <input id="role" type="text" class="form-control input-group" name="role" style="text-transform: capitalize;" value="{{ Auth::user()->role }}" disabled>
                </div>

                <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3">
                    <label for="email" class="text-md-right mr-lg-3">{{ __('Email') }}</label>
                    <input id="email" type="text" class="form-control input-group" name="email" value="{{ Auth::user()->email }}" disabled>
                </div>
            </div>
            <div class="m-3 ml-3 mt-4 my-md-4">
                <a href="{{ route('setting.edit', Auth::user()->id) }}">
                    <button type="submit" class="btn btn-primary">EDIT</button>
                </a>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection

