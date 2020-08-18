<?php

namespace App\Http\Controllers;

use App\Patient;
use App\StatDoses;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatDosesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Patient $patient)
    {
        $patient = Patient::findOrFail($patient->id);
//        return View('forms.stat_doses.create', compact('patient'));
        dd($patient);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function create()
    {
        $patients = Patient::all();
        return view('forms.stat_doses.show',['patients' => $patients])->with('message', 'You have successfully added the record!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        StatDoses::create([
            'patient_id' => request('id'),
            'date' => request('date'),
            'time'  => request('time'),
            'drug_name' => request('drug_name'),
            'dose_value' => request('dose_value'),
            'dose_unit' => request('dose_unit'),
            'prescribed_by' => request(Auth::user()->getAuthIdentifierName()),
        ]);
//
//        $patient = StatDoses::findOrFail('patient_id');
//        return View('forms.stat_doses.create', compact('patient'));
        return back()->with('message', 'You have successfully added the record!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
//        $statdoses = StatDoses::find($id);
//        return view('forms.stat_doses.show',array('statdoses' => $statdoses));
        $patients = DB::table('patients')->where([
            ['status', '=', 'yes'],
            ['live', '=', 'alive'],
        ])->get();

        return view('forms.stat_doses.index', ['patients' => $patients]);

//        dd($patient);
//        return View('forms.stat_doses.create', compact('patient'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function update($mrn)
    {
//        $arr['patient'] = $mrn;
        $patient = Patient::findOrFail($mrn);
        return View('forms.stat_doses.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $statdose = StatDoses::find($id);
        $statdose -> delete();
        return redirect()->back();
    }
}
