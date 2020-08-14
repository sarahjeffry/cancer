<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class FormController extends Controller
{
    function menu () {
//        Request $id
//        $patient = Patient::find($id);

//        return view('patient.forms',compact('patient'));
        return view('patient.forms');
    }
}
