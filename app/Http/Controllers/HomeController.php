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

//            $breast17 = DB::table('patients')
//                ->select(DB::raw('COUNT id FROM patients (WHERE type = "breast" AND year = 2017)'))
////                ->where('type', '=', 'breast')
////                ->where(function ($query) {
////                    $query->where('year', '=', 2017);
////                })
//                ->get();
//
//            $breast18 = DB::table('patients')
//                ->select(DB::raw('COUNT(patients.id)'))
//                ->where('type', '=', 'breast')
//                ->where(function ($query) {
//                    $query->where('year', '=', 2018);
//                })
//                ->get();
//
//            $breast19 = DB::table('patients')
//                ->select(DB::raw('COUNT(patients.id)'))
//                ->where('type', '=', 'breast')
//                ->where(function ($query) {
//                    $query->where('year', '=', 2019);
//                })
//                ->get();
//
//            $breast20 = DB::table('patients')
//                ->select(DB::raw('COUNT(patients.id)'))
//                ->where('type', '=', 'breast')
//                ->where(function ($query) {
//                    $query->where('year', '=', 2020);
//                })
//                ->get();

            return view('admin.index', compact('users'
//                'breast17','breast18','breast19','breast20'
//                'lung17', 'lung18','lung19','lung20',
//                'pancreas17','pancreas18','pancreas19','pancreas20',
//                'skin17','skin18','skin19','skin20'
            ));
        }

        else {
            return view('auth.login');
        }

    }
}
