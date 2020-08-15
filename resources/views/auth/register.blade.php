{{--@extends('layouts.blankapp')--}}

{{--@section('content')--}}

    <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'iCancer') }}</title>

{{--@yield('style')--}}
<!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <style>
        html, body {
            /*background-color:#3b5998;*/
            background: url('https://scontent.fkul4-1.fna.fbcdn.net/v/t31.0-8/20863580_1612099285528164_3282369048990331420_o.jpg?_nc_cat=106&_nc_sid=cdbe9c&_nc_ohc=14-E7_NHwGYAX_0JMnd&_nc_ht=scontent.fkul4-1.fna&oh=4d95debca33ce5c4028d9e1d2ddb6a59&oe=5F4F9E0B');
            background-size: 100%;
            font-size: 18px;
        }



        .login-btn {
            color: whitesmoke;
        }

        a:hover {
            text-decoration: none;
        }

        .login-btn:hover {
            color: royalblue;
            border-radius: 5px;
            padding: 4px 7px;
            width: 60px;
            background-color: whitesmoke;
        }

        .form-control {
            border-radius: 25px;
            padding-right: 5px;
        }
    </style>

{{--@section('content')--}}
    <ul class="navbar-nav ml-auto">
        <li class="nav-item">
            <br>
{{--            <a href="\login" class="offset-md-10 offset-md-4 row-cols-md-3 login-btn">--}}
            <a href="\login" class="offset-md-10 offset-md-4 row-cols-md-3 btn btn-light">
                    {{ __('Login') }}
            </a>
        </li>
    </ul>
<body>
<div >
    <br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card shadow">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4" style="padding-top: 20px;">Register to iCancer</h1>
                    <img src="https://i.imgur.com/DxiSrK9.png" width="11%" height="11%" alt="Clinic logo">
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Role') }}</label>
                            <br>
                            <div class="col-md-6">
                                <select required class="form-control animated--fade-in" name="role" id="role" style="width: 60%;">
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <option class="dropdown-item" value="admin">Admin</option>
                                        <option class="dropdown-item" value="consultant">Consultant</option>
                                        <option class="dropdown-item" value="nurse">Nurse</option>
                                    </div>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="staff_id" class="col-md-4 col-form-label text-md-right">{{ __('Staff ID') }}</label>

                            <div class="col-md-6">
                                <input id="staff_id" type="text" class="form-control" name="staff_id" value="{{ old('staff_id') }}" required>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
{{--@endsection--}}
{{--@endsection--}}
<!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
