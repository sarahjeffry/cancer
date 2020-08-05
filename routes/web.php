<?php

use App\Patient;
use App\User;
use App\StatDoses;
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
    return view('admin.index');
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

//Route::get('/view_patients', function () {
//
//    $results = DB::select('select * from patients where id =?', [1]);
////    foreach ($results as $patient) {}
//    return view('patient.index');
//});

Route::get('/report', function () {
    $patients = Patient::all();
    if(Auth::check()) {
        $users = User::all();
        return view('report', compact('patients'));
    }

    else {
        return view('auth.login');
    }
});

Route::resource('/patients', 'PatientController')->names('patients');
Route::resource('settings', 'UserController')->names('setting');

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
