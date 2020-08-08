@extends('patient.partials.main')

@yield('style')

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
        <a class="nav-link ml-0" href="\patients">
            <i class="fas fa-fw fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>

        <div class="card shadow mb-4 ">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Show {{$patient->name}}\'s detail</h6>
            </div>
            <div class="card-body col-sm-11 ml-lg-5">
                <div class="boxes justify-content-center col-md-11 ">
                    <div class="col ml-sm-3">
                        <div class="form-inline offset-md-2 my-sm-3">
                            <label for="name" class="text-md-right mr-lg-2">{{ __('Name') }}</label>
                            <input id="name" type="text" class="form-control input-group" name="name" value="{{ $patient->name }}" disabled>
                        </div>
                        <br>
                        <div class="form-inline offset-md-2 my-sm-3" >
                            <label for="role" class="text-md-right mr-lg-3">{{ __('MRN') }}</label>
                            <input id="role" type="text" class="form-control input-group" name="role" style="text-transform: capitalize;" value="{{ $patient->mrn }}" disabled>
                        </div>
                        <br>
                        <div class="form-inline offset-md-2 my-sm-3">
                            <label for="email" class="text-md-right mr-lg-3">{{ __('Cancer type') }}</label>
                            <input id="email" type="text" class="form-control input-group" name="email" value="{{ $patient->type }}" disabled>
                        </div>
                    </div>
                    <div class="offset-md-5 my-sm-3 mb-4">
                        <a href="{{ route('setting.edit', Auth::user()->id) }}">
                            <button type="submit" class="btn btn-primary">EDIT</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

@endsection

@section('scripts')

@endsection
