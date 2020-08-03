<?php

use App\Patient;
use App\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


//Route::get('/', function () {
//
//    if(Auth::check()) {
//        $users = User::all();
//        return view('admin.index');
//    }
//
//    else {
//        return view('auth.login');
//    }
////    return view('admin.index');
//});

Route::get('/home', function () {
    return view('admin.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/patients', function () {
    $patients = Patient::all();
    return view('patient.index', compact('patients'));
//    return view('patient.index', ['patients' => $patients]);
//    return view('patient.index');
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

Route::resource('/editpatient','PatientController@edit');
