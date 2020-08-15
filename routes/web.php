<?php

use App\Patient;
use App\User;
use App\StatDoses;
use App\Treatment;
use App\Premedication;
use Barryvdh\DomPDF\PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

//Route::get('/patients', function () {
//    $patients = Patient::all();
//    if(Auth::check()) {
//        $users = User::all();
//        return view('patient.index', compact('patients'));
//    }
//    else {
//        return view('auth.login');
//    }
//});

Route::get('/reports', function () {
    $patients = Patient::all();
    if(Auth::check()) {
        $users = User::all();
        return view('report.index', compact('patients'));
    }

    else {
        return view('auth.login');
    }
});

Route::get('generatePDF', function (){
    $pdf = (new Barryvdh\DomPDF\PDF)->getDomPDF();
    return $pdf->download('Patient_History.pdf');
});
Route::get('generatePDF/pdf', 'PDFController@pdf');

Route::get('/new', function () {
    if(Auth::check()) {
        return view('user_management.create');
    }
    else {
        return view('auth.login');
    }
});

Route::resource('/patients', 'PatientController')->names('patient');
Route::get('/patients/{id}', 'PatientController@show');

Route::resource('/settings', 'UserController')->names('setting');
Route::get('/settings/{id}/edit', 'UserController@edit');
Route::get('/users/{id}/destroy', 'UserController@destroy');
Route::get('/users', 'UserController@show');
Route::get('form','FormController@menu');

/*
|--------------------------------------------------------------------------
| Form Routes
|--------------------------------------------------------------------------
*/

Route::get('/forms', function () {
    if(Auth::check()) {
        $patients = Patient::all();
        return view('forms.index', compact('patients'));
    }
    else {
        return view('auth.login');
    }
});

/* S T A T  D O S E S */
Route::get('/forms/statdoses', 'StatDosesController@show');
Route::get('/statdoses/{id}/update', 'StatDosesController@update');
Route::get('/statdoses/{id}/create', 'StatDosesController@create');
Route::get('/statdoses/{id}/store', 'StatDosesController@store');

/* P R E M E D I C A T I O N */
Route::get('/forms/premedication', 'PremedicationController@show');
Route::get('/premedication/{id}/update', 'PremedicationController@update');
Route::get('/premedication/{id}/create', 'PremedicationController@create');
Route::get('/premedication/{id}/store', 'PremedicationController@store');

/* O R A L */
Route::get('/forms/oral', 'OralController@show');
Route::get('/oral/{id}/update', 'OralController@update');
Route::get('/oral/{id}/create', 'OralController@create');
Route::get('/oral/{id}/store', 'OralController@store');

/* I N F U S I O N */
Route::get('/forms/infusion', 'InfusionController@show');
Route::get('/infusion/{id}/update', 'InfusionController@update');
Route::get('/infusion/{id}/create', 'InfusionController@create');
Route::get('/infusion/{id}/store', 'InfusionController@store');

/* I N J E C T I O N */
Route::get('/forms/injection', 'InjectionController@show');
Route::get('/injection/{id}/update', 'InjectionController@update');
Route::get('/injection/{id}/create', 'InjectionController@create');
Route::get('/injection/{id}/store', 'InjectionController@store');

/* O P E R A T I O N */
Route::get('/forms/operation', 'OperationController@show');
Route::get('/operation/{id}/update', 'OperationController@update');
Route::get('/operation/{id}/create', 'OperationController@create');
Route::get('/operation/{id}/store', 'OperationController@store');

/* C H A R T */
Route::get('/forms/chart', 'ChartController@show');
Route::get('/chart/{id}/update', 'ChartController@update');
Route::get('/chart/{id}/create', 'ChartController@create');
Route::get('/chart/{id}/store', 'ChartController@store');

/* I N H A L A T I O N */
Route::get('/forms/inhalation', 'InhalationController@show');
Route::get('/inhalation/{id}/update', 'InhalationController@update');
Route::get('/inhalation/{id}/create', 'InhalationController@create');
Route::get('/inhalation/{id}/store', 'InhalationController@store');
//Route::resource('/statdoses', 'StatDosesController')->names('stat_dose');
//1. Select a patient from the table
//Route::get('forms/statdose', function () {
//    $patients = DB::table('patients')
//        ->where('status', '=', 'yes')
//        ->where(function ($query) {
//            $query->where('live', '=', 'alive');
//        })
//        ->get();
//
//    return view('forms.stat_doses.index', ['patients' => $patients]);
//});
//Route::resource('/oral', 'OralController')->names('oral');
//Route::resource('/premedication', 'PremedicationController')->names('premedication');

/*     T E M P O R A R Y    R O U T E S      */
//Route::get('/statdoses', function () {
//    $patients = Patient::all();
//    return view('forms.stat_doses.create', compact('patients'));
//});

Route::get('/oral', function () {
    $patients = Patient::all();
    return view('forms.oral.create', compact('patients'));
});

Route::get('/injections', function () {
    $patients = Patient::all();
    return view('forms.injections.create', compact('patients'));
});

Route::get('/charts', function () {
    $patients = Patient::all();
    return view('forms.charts.create', compact('patients'));
});

Route::get('/premedication', function () {
    $patients = Patient::all();
    return view('forms.premedication.create', compact('patients'));
});

Route::get('/infusion', function () {
    $patients = Patient::all();
    return view('forms.infusion.create', compact('patients'));
});

Route::get('/operation', function () {
    $patients = Patient::all();
    return view('forms.operation.create', compact('patients'));
});

Route::get('/inhalation', function () {
    $patients = Patient::all();
    return view('forms.inhalation.create', compact('patients'));
});

