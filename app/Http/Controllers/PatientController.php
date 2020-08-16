<?php

namespace App\Http\Controllers;

use App\Infusion;
use App\Inhalation;
use App\Injection;
use App\Operation;
use App\Oral;
use App\Patient;
use App\Premedication;
use App\StatDoses;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(request $request)
    {

        $patients = DB::table('patients')->where([
            ['status', '=', 'yes'],
            ['live', '=', 'alive'],
        ])->get();

        return view('patient.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($mrn)
    {
        $patient = Patient::findOrFail($mrn);
        $statdoses = StatDoses::findOrFail($mrn);

        return view('patient.show', compact('patient', 'statdoses'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return string
     */
    public function edit(Patient $patient)
    {
        $patient = Patient::find($patient->id);
        return view('report.edit', compact('patient'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
//
        $patient->update([
            'name'      => $request->name, //'view'  => $request->column in database
            'email'     => $request->email,
            'password' => Hash::make($request->password),
        ]);

//        return back()->with('message', 'You have successfully added the record!');
        return view('patient.show')
            ->with('message', 'You have successfully updated your profile!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        DB::table('patients')->where('id', '=', $id)->delete();

//        return redirect()->back()->with('message', 'You have deleted the record.');
        return redirect()->back()->with('message', 'You have deleted the record.');
    }
}
