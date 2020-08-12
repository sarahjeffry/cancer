<?php

use App\Patient;
use App\User;
use App\StatDoses;
use App\Treatment;
use App\Premedication;
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

Route::resource('/patient', 'PatientController')->names('patients');
Route::resource('/settings', 'UserController')->names('setting');

/*
|--------------------------------------------------------------------------
| Form Routes
|--------------------------------------------------------------------------
*/

Route::get('/forms', function () {
    $patients = Patient::all();
    if(Auth::check()) {
        $users = User::all();
        return view('forms.index', compact('patients'));
    }

    else {
        return view('auth.login');
    }
});

//Route::resource('/statdoses', 'StatDosesController')->names('stat_doses');
//Route::resource('/oral', 'OralController')->names('oral');
//Route::resource('/premedication', 'PremedicationController')->names('premedication');

/*     T E M P O R A R Y    R O U T E S      */
Route::get('/statdoses', function () {
    $patients = Patient::all();
    return view('forms.stat_doses.create', compact('patients'));
});

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
