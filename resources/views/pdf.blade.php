<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>iCancer</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">

    <!-- Custom styles for dataTables-->
    <link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

<style>
    th {
        color: #3d3e47 !important;
    }
</style>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">History</h1>
        <p class="mb-4">History of registered patients</p>

        <!-- DataTales Example -->

            <div class="card-body col-sm-11 ml-lg-5">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Height</th>
                            <th>Weight</th>
                            <th>Year admitted</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($patient_data as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->gender}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->mrn}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->type}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->live}}</td>
                                <td class="text-md-center" >{{$patient->height}} m</td>
                                <td class="text-md-center" >{{$patient->weight}} Kg</td>
                                <td class="text-md-center" >{{$patient->year}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
</div>

</body>

</html>
