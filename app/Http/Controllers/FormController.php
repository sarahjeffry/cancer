<?php

namespace App\Http\Controllers;

use App\Patient;
use Illuminate\Http\Request;

class FormController extends Controller
{
    function index ($id) {

        $patient = Patient::findOrFail($id);
        return View('forms.index', compact('patient'));
    }
}
