<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\PDF;

class PDFController extends Controller
{
    function index() {
        $patient_data = $this->get_patients_data();

        return view('pdf')->with('patient_data', $patient_data);
    }

    function get_patients_data() {
        $patient_data = DB::table('patients')
                        ->limit(10)
                        ->get();

        return $patient_data;
    }

    function pdf(){
        $pdf = \PDF::make('dompdf.wrapper');
        $pdf->loadHTML($this->convert_patient_data_to_html());
        return $pdf->stream();
    }

    function convert_patient_data_to_html() {
        $patient_data = $this->get_patients_data();
        $output = '
            <h1 class="h3 mb-2 text-gray-800">History</h1>

            <table style="border-collapse: collapse; border: 0px;" width="100%">
               <tr style="text-align: center">
                            <th style="border: 1px solid; padding: 3px;">Name</th>
                            <th style="border: 1px solid; padding: 3px;">Gender</th>
                            <th style="border: 1px solid; padding: 3px;">MRN</th>
                            <th style="border: 1px solid; padding: 3px;">Cancer Type</th>
                            <th style="border: 1px solid; padding: 3px;">Height</th>
                            <th style="border: 1px solid; padding: 3px;">Weight</th>
                            <th style="border: 1px solid; padding: 3px;">Year admitted</th>
                        </tr>
                        ';
                        foreach($patient_data as $patient)
                            $output .= '
                                <tr style="text-align: center">
                                <td style="text-align: left !important;">'.$patient->name.'</td>
                                <td style="text-transform: capitalize;">'.$patient->gender.'</td>
                                <td style="text-transform: uppercase;">'.$patient->mrn.'</td>
                                <td style="text-transform: capitalize;">'.$patient->type.'</td>
                                <td style="text-transform: capitalize;">'.$patient->height.'</td>
                                <td style="text-transform: capitalize;">'.$patient->weight.'</td>
                                <td style="text-transform: capitalize;">'.$patient->year.'</td>
                            </tr>
                            ';
        $output .=    '</table>';
        return $output;

    }
}
