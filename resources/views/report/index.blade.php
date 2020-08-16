@extends('report.partials.main')

@yield('style')
<!-- DataTables Bootstrap CSS -->
<link href="{{asset('vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

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
        @if(session()->has('message'))
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ session()->get('message') }}
            </div>
        @endif
        <!-- Page Heading -->
        @if(Auth::user()->role == 'admin')
            <h1 class="h3 mb-2 text-gray-800">Patients</h1>
            <a class="nav-link float-right" id="print" href="{{ url('generatePDF') }}" @click.prevent="printlayer">
                <i class="fas fa-fw mb-2 fa-print"></i>
                <span>Print</span>
            </a>
            <p class="mb-4">Registered patients</p>
        @endif
        @if(Auth::user()->role == 'consultant')
            <h1 class="h3 mb-2 text-gray-800">History</h1>
            <a class="nav-link float-right" id="print" href="{{ url('generatePDF') }}" @click.prevent="printlayer">
                <i class="fas fa-fw mb-2 fa-print"></i>
                <span>Print</span>
            </a>
            <p class="mb-4">History of registered patients</p>
        @endif
        @if(Auth::user()->role == 'nurse')
            <h1 class="h3 mb-2 text-gray-800">History</h1>
            <a class="nav-link float-right" id="print" href="{{ url('generatePDF') }}" @click.prevent="printlayer">
                <i class="fas fa-fw mb-2 fa-print"></i>
                <span>Print</span>
            </a>
            <p class="mb-4">History of registered patients</p>
        @endif
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
                            @if(Auth::user()->role == 'consultant')
                                <th>Gender</th>
                            @endif
                            @if(Auth::user()->role == 'nurse')
                                <th>Gender</th>
                            @endif
                            <th>MRN</th>
                            <th>Consultant</th>
{{--                            <th>Status</th>--}}
                            <th>Year admitted</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot class="text-md-center">
                        <tr>
                            <th>Name</th>
                            @if(Auth::user()->role == 'consultant')
                                <th>Gender</th>
                            @endif
                            @if(Auth::user()->role == 'nurse')
                                <th>Gender</th>
                            @endif
                            <th>MRN</th>
                            <th>Consultant</th>
{{--                            <th>Status</th>--}}
                            <th>Date admitted</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($patients as $patient)
                            <tr>
                                <td>{{$patient->name}}</td>
                                @if(Auth::user()->role == 'nurse')
                                    <td class="text-md-center" style="text-transform: capitalize;">{{$patient->gender}}</td>
                                @endif
                                @if(Auth::user()->role == 'consultant')
                                    <td class="text-md-center" style="text-transform: capitalize;">{{$patient->gender}}</td>
                                @endif
                                <td class="text-md-center" style="text-transform: uppercase;">{{$patient->patient_id}}</td>
                                <td class="text-md-center text-uppercase" style="text-transform: capitalize;">{{$patient->staff_id}}</td>
{{--                                <td class="text-md-center" style="text-transform: capitalize;">{{$patient->live}}</td>--}}
                                <td class="text-md-center" >{{$patient->date_in}}</td>
                                <td class="text-md-center" >
                                    <a href="/patients/{{$patient->id}}/show">
                                        <button type="submit" class="btn btn-info">VIEW</button>
                                    </a>
                                    @if(Auth::user()->role == 'admin')
{{--                                        <a href="/patients/{{$patient->id}}/edit">--}}
{{--                                            <button type="submit" class="btn btn-warning">EDIT</button>--}}
{{--                                        </a>--}}

                                        <a class=" shadow animated--grow-in" aria-labelledby="userDropdown" href="/patients/{{ $patient->id }}/destroy">
                                            <button type="submit" class="btn btn-danger">DELETE</button>
                                            <form id="delete-form" action="{{route('patient.destroy', $patient->id)}}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </a>
                                    @endif
                                </td>
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
