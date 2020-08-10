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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::get('/home', function () {
    if(Auth::check()) {
        return view('admin.index');
    }
    else {
        return view('auth.login');
    }

});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/patients', function () {
    $patients = Patient::all();
    if(Auth::check()) {
        $users = User::all();
        return view('patient.index', compact('patients'));
    }
    else {
        return view('auth.login');
    }
});

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

//Route::get('/settings', function () {
//    if(Auth::check()) {
//        $users = User::all();
//        return view('settings', compact('users'));
//    }
//
//    else {
//        return view('auth.login');
//    }
//});

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

Route::resource('/statdoses', 'StatDosesController')->names('stat_doses');
Route::resource('/oral', 'OralController')->names('oral');
Route::resource('/premedication', 'PremedicationController')->names('premedication');

/*     T E M P O R A R Y    R O U T E S      */
//Route::get('/oral', function () {
//    $patients = Patient::all();
//    return view('forms.oral.index', compact('patients'));
//});

Route::get('/injections', function () {
    $patients = Patient::all();
    return view('forms.injections.index', compact('patients'));
});

Route::get('/charts', function () {
    $patients = Patient::all();
    return view('forms.charts.index', compact('patients'));
});

//Route::get('/premedication', function () {
//    $patients = Patient::all();
//    return view('forms.premedication.create', compact('patients'));
//});

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
