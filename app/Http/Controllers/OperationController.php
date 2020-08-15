<?php

namespace App\Http\Controllers;

use App\Operation;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $patients = Patient::all();
        return view('forms.infusion.show',['patients' => $patients])->with('message', 'You have successfully added the record!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        Operation::create([
            'patient_id' => request('id'),
            'date' => request('date'),
            'time'  => request('time'),
            'operation'  => request('operation'),
            'diagnosis' => request('diagnosis'),
            'shaving' => request('shaving'),
            'anaesthetist' => request('anaesthetist'),
            'diet' => request('diet'),
            'prescribed_by' => Auth::user()->getAuthIdentifierName(),
        ]);
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
        $patients = DB::table('patients')->where([
            ['status', '=', 'yes'],
            ['live', '=', 'alive'],
        ])->get();

        return view('forms.operation.index', ['patients' => $patients]);
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($mrn)
    {
        $patient = Patient::findOrFail($mrn);
        return View('forms.operation.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $operation = Operation::find($id);
        $operation -> delete();
        return redirect()->back();
    }
}
