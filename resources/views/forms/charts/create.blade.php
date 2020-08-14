@extends('forms.partials.main')

<!-- Styles -->

@yield('styles')

<link rel="stylesheet" href="{{ asset('css\visualizations.css') }}">
<style>
    .col-lg-10 {
        padding:0 !important;
    }

    .custom-file {
        position: relative !important;;
    }

    .custom-file-label {
        width: 300px !important;
    }
</style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chart</h1>
        <p class="mb-4">Add { $patient->name }} chart</p>

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
                            <label class="control-label">MRN:</label> <input type="text" name="mrn" class="form-control ml-3 mr-4" style="width: 150px;" value="{ $patient->patient_id }}" disabled>
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
                            <label class="control-label">Treatment:</label> <textarea type="text" name="treatment" class="form-control textarea ml-2 mr-4" style="resize: none; width: 320px;" required></textarea>
                            <label class="control-label">IV Infusion:</label> <textarea type="text" name="infusion" class="form-control textarea ml-2 mr-4" style="resize: none; width: 320px;" required></textarea>
                        </div>
                        <div class="form-inline mb-sm-4">
                            <label class="control-label ml-3 mr-3">Diet order:</label>
                            <input type="radio" id="normal" name="diet" value="normal" class="ml-3 mr-1" required><label for="normal">Normal</label>
                            <input type="radio" id="diabetic" name="diet" value="diabetic" class="ml-3 mr-1" required><label for="diabetic">Diabetic</label>
                            <input type="radio" id="low_salt" name="diet" value="low salt" class="ml-3 mr-1"><label for="low_salt">Low salt</label>

                            <div class="form-inline custom-file mb-3 control-label ml-4 mr-3" style="width: 350px !important;">
                                <input type="file" class="custom-file-input ml-4 mr-3" id="customFile" name="filename">
                                <label class="custom-file-label" for="customFile">Upload chart</label>
                            </div>
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

@endsection

<!-- Scripts -->

@section('scripts')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>

@endsection
