@extends('layouts.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Settings</h1>
        <p class="mb-4">Edit {{ Auth::user()->name }} Details</p>

        <form action="{{route('setting.update', Auth::user()->id)}}" method="PATCH" class="form-horizontal">
            {{ csrf_field() }}
            <div class="card shadow">
                <div class="row ml-sm-3 justify-content-center col col-md-11 ">
                    <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3 m-4">
                        <label for="name" class="text-md-right mr-lg-3">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control input-group" name="name" value="{{ Auth::user()->name }}" required>
                    </div>

                    <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3 m-4" >
                        <label for="role" class="text-md-right mr-lg-3">{{ __('Role') }}</label>
                        <input id="role" type="text" class="form-control input-group" name="role" style="text-transform: capitalize;" value="{{ Auth::user()->role }}" required>
                    </div>

                    <div class="form-inline offset-md-2 row ml-sm-3 my-sm-3">
                        <label for="email" class="text-md-right mr-lg-3">{{ __('Email') }}</label>
                        <input id="email" type="text" class="form-control input-group" name="email" value="{{ Auth::user()->email }}"  required>
                    </div>
                </div>
                <div class="m-3 ml-3 mt-4 m-auto mb-4">
                    <input type="submit" value="UPDATE" class="btn btn-primary mr-4"/>
                    <a href="{{ route('setting.edit', Auth::user()->id) }}">
                        <button type="submit" class="btn btn-light">CANCEL</button>
                    </a>

                </div>
            </div>
        </form>

    </div>
    <!-- End of Main Content -->

@endsection

<!-- Scripts -->

@section('scripts')

@endsection

