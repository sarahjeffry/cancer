<?php

namespace App\Http\Controllers;
use App\Injection;
use App\Patient;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class InjectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $patients = Patient::all();
        return view('forms.injections.show',['patients' => $patients])->with('message', 'You have successfully added the record!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        Injection::create([
            'patient_id' => request('id'),
            'date' => request('date'),
            'time'  => request('time'),
            'route'  => request('route'),
            'drug_name' => request('drug_name'),
            'dose_value' => request('dose_value'),
            'dose_unit' => request('dose_unit'),
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

        return view('forms.injections.index', ['patients' => $patients]);
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
        return View('forms.injections.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $injection = Injection::find($id);
        $injection -> delete();
        return redirect()->back();
    }
}
