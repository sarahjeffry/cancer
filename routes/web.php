<?php
use App\Patient;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');

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

/*
|--------------------------------------------------------------------------
| PDF generator Routes
|--------------------------------------------------------------------------
*/
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
/*
|--------------------------------------------------------------------------
| Patient Management Routes - ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::resource('/patients', 'PatientController')->names('patient');
Route::get('/patients/{id}/show', 'PatientController@show');
/* /patients/{{$patient->id}}/show
|--------------------------------------------------------------------------
| User Management Routes - ADMIN ONLY
|--------------------------------------------------------------------------
*/
Route::get('/users', 'UserController@show');
Route::get('/users/{id}/destroy', 'UserController@destroy');
Route::get('/patients/{id}/destroy', 'PatientController@destroy');
Route::get('form','FormController@menu');
/*
|--------------------------------------------------------------------------
| Settings Routes
|--------------------------------------------------------------------------
*/
Route::resource('settings/create','UserController')->names('create_user');
Route::get('/settings/{id}/edit', 'UserController@edit');
Route::get('/settings/{id}/update', 'UserController@update');
Route::resource('/settings', 'AdminController')->names('setting');
//Route::get('/users/{id}/destroy', 'UserController@destroy');
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
/* From Patients to Form */
//Route::get('/forms/{id}','FormController@index');

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

