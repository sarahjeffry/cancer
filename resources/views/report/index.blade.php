@extends('report.partials.main')

@yield('style')
<!-- DataTables Bootstrap CSS -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

    <style>
        th {
            color: #3d3e47 !important;
        }
    </style>

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">History</h1>
        <a class="nav-link float-right" id="print" href="{{ url('generatePDF') }}" @click.prevent="printlayer">
            <i class="fas fa-fw mb-2 fa-print"></i>
            <span>Print</span>
        </a>
        <p class="mb-4">History of registered patients</p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Patients List</h6>
            </div>
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
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot class="text-md-center">
                        <tr>
                            <th>Name</th>
                            <th>Gender</th>
                            <th>MRN</th>
                            <th>Type</th>
                            <th>Status</th>
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->gender}}</td>
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->patient_id}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->type}}</td>
                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->live}}</td>
                                <td class="text-md-center" >{{$patient->year}}</td>
                                <td class="text-md-center" ><a href="{{ route('patients.show', $patient->patient_id) }}">
                                        <button type="submit" class="btn btn-info">VIEW</button>
                                    </a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

@endsection

@push('js')
        <script type="text/javascript">
            $(document).ready( function () {
                $('.table').DataTable();
            } );

            function printlayer(Layer) {
                var generator=window.open(",'name,");
                var layertext = document.getElementById(layer);
                generator.document.write(layertext.innerHTML.replace("Print patient history"));

                generator.document.close();
                generator.print();
                generator.close();
            }
        </script>
@endpush
