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
            ['live', '=', 'alive']
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
    public function show($id)
    {
//        dd($patient);
        $patient = Patient::findOrFail($id);
        $statdoses = StatDoses::findOrFail($id);
//        if ($statdose->isEmpty()) {
//            $statdose = "No data recorded for statdoses";
//        }

        $orals = Oral::findOrFail($id);
        $injections = Injection::findOrFail($id);
        $infusions = Infusion::findOrFail($id);
        $inhalations = Inhalation::findOrFail($id);
        $operations = Operation::findOrFail($id);
        $premedications = Premedication::findOrFail($id);

        return View('patient.show', compact('patient',
            'statdoses', 'orals', 'injections', 'infusions',
            'inhalations','operations', 'premedications'));
//        dd($patient->id, $statdoses->drug_name, $orals->duration, $injections->dose_value, $infusions->date, $inhalations->time, $operations->date, $premedications->id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $patient = Patient::find($id);

        //dd($task); //--> for debugging
        $patient -> delete();
        return redirect()->back();
    }
}
