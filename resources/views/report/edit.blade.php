@extends('report.partials.main')

@section('content')

    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Edit {{$patient->name}} Details</h1>
        <a class="nav-link ml-0 col-2" href="/reports" >
            <i class="fas fa-fw fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
    </div>

@endsection
