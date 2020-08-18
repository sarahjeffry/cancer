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
    public function show($id)
    {
        $patient = Patient::findOrFail($id);

//        $users = DB::table('users')
//            ->join('contacts', 'users.id', '=', 'contacts.user_id')
//            ->join('orders', 'users.id', '=', 'orders.user_id')
//            ->select('users.*', 'contacts.phone', 'orders.price')
//            ->get();

        $statdoses = DB::table('patients')
            ->join('stat_doses', 'patients.id', '=', 'stat_doses.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'stat_doses.drug_name', 'stat_doses.dose_value',
                'stat_doses.date', 'stat_doses.time',
                'stat_doses.dose_unit', 'stat_doses.prescribed_by')
            ->where('stat_doses.patient_id', '=', $id)
            ->get();

        $premedications = DB::table('patients')
            ->join('premedications', 'patients.id', '=', 'premedications.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'premedications.drug_name', 'premedications.dose_value',
                'premedications.date', 'premedications.time', 'premedications.route',
                'premedications.dose_unit', 'premedications.prescribed_by')
            ->where('premedications.patient_id', '=', $id)
            ->get();

        $orals = DB::table('patients')
            ->join('orals', 'patients.id', '=', 'orals.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'orals.drug_name', 'orals.dose_value',
                'orals.date', 'orals.time', 'orals.frequency',
                'orals.dose_unit', 'orals.prescribed_by')
            ->where('orals.patient_id', '=', $id)
            ->get();

        $infusions = DB::table('patients')
            ->join('infusions', 'patients.id', '=', 'infusions.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'infusions.drug_name', 'infusions.dose_value',
                'infusions.date', 'infusions.time',
                'infusions.dose_unit', 'infusions.prescribed_by')
            ->where('infusions.patient_id', '=', $id)
            ->get();

        $injections = DB::table('patients')
            ->join('injections', 'patients.id', '=', 'injections.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'injections.date', 'injections.time', 'injections.route',
                'injections.drug_name', 'injections.dose_value',
                'injections.dose_unit', 'injections.prescribed_by')
            ->where('injections.patient_id', '=', $id)
            ->get();

        $operations = DB::table('patients')
            ->join('operations', 'patients.id', '=', 'operations.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'operations.date', 'operations.time', 'operations.operation',
                'operations.diagnosis', 'operations.shaving',
                'operations.anaesthetist','operations.diet', 'operations.prescribed_by')
            ->where('operations.patient_id', '=', $id)
            ->get();

        $charts = DB::table('patients')
            ->join('charts', 'patients.id', '=', 'charts.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'charts.treatment', 'charts.iv_infusion',
                'charts.diet','charts.chart_img', 'charts.prescribed_by')
            ->where('charts.patient_id', '=', $id)
            ->get();

        $inhalations = DB::table('patients')
            ->join('inhalations', 'patients.id', '=', 'inhalations.patient_id')
            ->join('users','patients.staff_id', '=', 'users.staff_id')
            ->select('patients.*', 'users.name',
                'inhalations.date', 'inhalations.time',
                'inhalations.drug_name','inhalations.dose_value',
                'inhalations.dose_unit', 'inhalations.prescribed_by',
                'inhalations.frequency','inhalations.duration')
            ->where('inhalations.patient_id', '=', $id)
            ->get();

        return view('patient.show', compact('patient', 'statdoses', 'premedications',
            'orals', 'infusions','injections','operations','charts','inhalations'));
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
