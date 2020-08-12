<?php

namespace App\Http\Controllers;

use App\Patient;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::check()) {
            $users = User::all();

            $breast15 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2015]
            ])->count();

            $breast16 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2016]
            ])->count();

            $breast17 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2017]
            ])->count();

            $breast18 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2018]
            ])->count();

            $breast19 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2019]
            ])->count();

            $breast20 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2020]
            ])->count();

            $lung15 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2015]
            ])->count();

            $lung16 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2016]
            ])->count();

            $lung17 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2017]
            ])->count();

            $lung18 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2018]
            ])->count();

            $lung19 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2019]
            ])->count();

            $lung20 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2020]
            ])->count();

            $pancreas15 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2015]
            ])->count();

            $pancreas16 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2016]
            ])->count();

            $pancreas17 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2017]
            ])->count();

            $pancreas18 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2018]
            ])->count();

            $pancreas19 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2019]
            ])->count();

            $pancreas20 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2020]
            ])->count();

            $skin15 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2015]
            ])->count();

            $skin16 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2016]
            ])->count();

            $skin17 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2017]
            ])->count();

            $skin18 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2018]
            ])->count();

            $skin19 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2019]
            ])->count();

            $skin20 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2020]
            ])->count();

            $deadbreast15 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2015],
                ['live', '=', 'deceased']
            ])->count();

            $deadbreast16 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2016],
                ['live', '=', 'deceased']
            ])->count();

            $deadbreast17 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2017],
                ['live', '=', 'deceased']
            ])->count();

            $deadbreast18 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2018],
                ['live', '=', 'deceased']
            ])->count();

            $deadbreast19 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2019],
                ['live', '=', 'deceased']
            ])->count();

            $deadbreast20 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2020],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung15 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2015],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung16 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2016],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung17 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2017],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung18 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2018],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung19 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2019],
                ['live', '=', 'deceased']
            ])->count();

            $deadlung20 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2020],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas15 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2015],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas16 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2016],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas17 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2017],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas18 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2018],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas19 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2019],
                ['live', '=', 'deceased']
            ])->count();

            $deadpancreas20 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2020],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin15 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2015],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin16 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2016],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin17 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2017],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin18 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2018],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin19 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2019],
                ['live', '=', 'deceased']
            ])->count();

            $deadskin20 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2020],
                ['live', '=', 'deceased']
            ])->count();

            $patientbreast20 = DB::table('patients')->where([
                ['type', '=', 'breast'],
                ['year', '=', 2020]
            ])->count();

            $patientlung20 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['year', '=', 2020]
            ])->count();

            $patientpancreas20 = DB::table('patients')->where([
                ['type', '=', 'pancreas'],
                ['year', '=', 2020]
            ])->count();

            $patientskin20 = DB::table('patients')->where([
                ['type', '=', 'skin'],
                ['year', '=', 2020]
            ])->count();

            $smoke15 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2015]
            ])->count();

            $notsmoke15 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2015]
            ])->count();

            $smoke16 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2016]
            ])->count();

            $notsmoke16 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2016]
            ])->count();

            $smoke17 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2017]
            ])->count();

            $notsmoke17 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2017]
            ])->count();

            $smoke18 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2018]
            ])->count();

            $notsmoke18 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2018]
            ])->count();

            $smoke19 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2019]
            ])->count();

            $notsmoke19 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2019]
            ])->count();

            $smoke20 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'yes'],
                ['year', '=', 2020]
            ])->count();

            $notsmoke20 = DB::table('patients')->where([
                ['type', '=', 'lung'],
                ['smoking', '=', 'no'],
                ['year', '=', 2020]
            ])->count();

            return view('admin.index', compact('users',
                'breast15','breast16','breast17','breast18','breast19','breast20',
                'lung15', 'lung16', 'lung17', 'lung18','lung19','lung20',
                'pancreas15','pancreas16','pancreas17','pancreas18','pancreas19','pancreas20',
                'skin15','skin16','skin17','skin18','skin19','skin20',
                'deadbreast15','deadbreast16','deadbreast17','deadbreast18','deadbreast19','deadbreast20',
                'deadlung15', 'deadlung16','deadlung17', 'deadlung18','deadlung19','deadlung20',
                'deadpancreas15','deadpancreas16','deadpancreas17','deadpancreas18','deadpancreas19','deadpancreas20',
                'deadskin15','deadskin16','deadskin17','deadskin18','deadskin19','deadskin20',
                'patientbreast20', 'patientlung20', 'patientpancreas20', 'patientskin20',
                'smoke15', 'smoke16', 'smoke17', 'smoke18', 'smoke19', 'smoke20',
                'notsmoke15', 'notsmoke16', 'notsmoke17', 'notsmoke18', 'notsmoke19', 'notsmoke20'
            ));
        }

        else {
            return view('auth.login');
        }

    }
}
