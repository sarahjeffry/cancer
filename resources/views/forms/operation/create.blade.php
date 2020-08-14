@extends('forms.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">
<style>
    .col-lg-10 {
        padding:0 !important;
    }

</style>


@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Operation</h1>
        <p class="mb-4">Add { $patient->name }} operation record</p>
        <a class="nav-link ml-0" href="forms">
            <i class="fas fa-fw mb-2 fa-arrow-circle-left"></i>
            <span>Back</span>
        </a>
        <form action="#" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <div class="card shadow offset-md-1 col-lg-10">
                <div class="card-header">
                    <div class="ml-lg-5 mt-sm-3 justify-content-between">
                        <span class="form-inline mb-sm-4">
                            <label class="control-label mb-3">Name:</label> <input type="text" name="name" class="form-control ml-3 mr-4" style="width: 300px;" value="{ $patient->name }}" disabled>
                            <label class="control-label ml-3 ">Gender:</label> <input type="text" name="gender" class="form-control ml-3 mr-4" style="width: 200px;" value="{ $patient->gender }}" disabled>&nbsp;
                            <label class="control-label">MRN:</label> <input type="text" name="mrn" class="form-control ml-3 mr-4" style="width: 150px;" value="{ $patient->mrn }}" disabled>
                        </span>
                        <span class="form-inline mb-sm-3">
                            <label class="control-label">Cancer Type:</label> <input type="text" name="type" class="form-control ml-3 mr-4" value="{ $patient->type }}" disabled>
                            <label class="control-label">Height:</label> <input type="text" name="height" class="form-control ml-3 mr-4" style="width: 80px;" value="{ $patient->type }} m" disabled>&nbsp;
                            <label class="control-label">Weight:</label> <input type="text" name="weight" class="form-control ml-3 mr-4" style="width: 80px;" value="{ $patient->weight }} Kg" disabled>
                            <label class="control-label">Smoking:</label> <input type="text" name="smoking" class="form-control ml-3 mr-4" style="width: 70px;" value="{ $patient->smoking }}" disabled>&nbsp;
                        </span>
                    </div>

                </div>
                <div class="form-inline justify-content-around">
                    <div class="mt-sm-4 justify-content-between">
                        <div class="form-inline mb-sm-4">
                            <label class="control-label mb-1">Date prescribed: </label> <input type="date" name="date" class="form-control ml-3 mr-4" style="width: 150px;" required>
                            <label class="control-label ml-3 ">Time:</label> <input type="time" name="time" class="form-control ml-2 mr-4" style="width: 120px;" required>
                            <label class="control-label">Operation:</label> <input type="text" name="operation" class="form-control ml-2 mr-4" style="width: 300px;" required>
                        </div>
                        <div class="form-inline mb-sm-4">
                            <label class="control-label">Diagnosis:</label> <textarea type="text" name="diagnosis" class="form-control textarea ml-2 mr-4 col-sm-8" style="resize: none;" required></textarea>
                            <label class="control-label ml-3">Shaving:</label>
                            <label>
                                <input type="radio" id="yes" name="shaving" value="yes" class="ml-3 mr-1" required><label for="yes">Yes</label>
                                <input type="radio" id="no" name="shaving" value="no" class="ml-3 mr-1"><label for="no">No</label>
                            </label>
                        </div>

                        <div class="form-inline mb-sm-4">
                            <label class="control-label">Anaesthetist:</label>
                            <select required class="form-control animated--fade-in ml-3 mr-2" name="anaesthetist" id="anaesthetist" style="width: 110px;">
                                    <option class="dropdown-item" value="nil">Nil</option>
                                    <option class="dropdown-item" value="spinal">Spinal</option>
                                    <option class="dropdown-item" value="local">Local</option>
                                    <option class="dropdown-item" value="general">General</option>
                                    <option class="dropdown-item" value="sedation">Sedation</option>
                                    <option class="dropdown-item" value="epidural">Epidural</option>
                            </select>

                            <label class="control-label ml-4">Diet order:</label>
                            <input type="radio" id="normal" name="diet" value="normal" class="ml-3 mr-1" required><label for="normal">Normal</label>
                            <input type="radio" id="diabetic" name="diet" value="diabetic" class="ml-3 mr-1" required><label for="diabetic">Diabetic</label>
                            <input type="radio" id="low_salt" name="diet" value="low salt" class="ml-3 mr-1"><label for="low_salt">Low salt</label>
{{--                            <input type="radio" id="others" name="diet" value="others" class="ml-3 mr-1"><label for="others">Others</label>--}}
{{--                            <input type="text" id="others" name="diet" class="form-control form-inline ml-sm-2" style="width: 150px;">--}}
                        </div>

                        <div class="form-inline mt-2 mb-lg-3">
                            <input type="submit" value="SAVE" class="btn btn-primary offset-5"/>
                            <a href="forms">
                                <div class="btn btn-secondary ml-2">CANCEL</div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!-- End of Main Content -->

{{--    <a href="{{route('stat_doses.index')}}"><button type="button" class="backbtn">⬅</button></a>--}}

@endsection

<!-- Scripts -->

@section('scripts')
    <script>
        function checkFrequency(val)
        {
            if(val==="others")
                document.getElementById('anaesthetist').style.display='block';
            else
                document.getElementById('anaesthetist').style.display='none';
        }

        function checkDuration(val)
        {
            if(val==="others")
                document.getElementById('duration').style.display='block';
            else
                document.getElementById('duration').style.display='none';
        }
    </script>

@endsection
