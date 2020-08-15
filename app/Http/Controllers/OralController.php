<?php

namespace App\Http\Controllers;
use App\Oral;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;
use Illuminate\Support\Facades\Auth;

class OralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('forms.premedication.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $patients = Patient::all();
        return view('forms.oral.show',['patients' => $patients])->with('message', 'You have successfully added the record!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(array $data, Request $mrn)
    {
//        Oral::create([
//            'patient_id' => $data['mrn'],
//            'date' => $data['date'],
//            'time' => $data['time'],
//            'mrn'  => $mrn,
//            'drug_name' => $data['drug_name'],
//            'route' => $data['route'],
////            'prescribed_by' => $data['Auth::user()->']
//        ]);
        Oral::create([
            'patient_id' => request('id'),
            'date' => request('date'),
            'time'  => request('time'),
            'mrn' => request('mrn'),
            'drug_name' => request('drug_name'),
            'route' => request('route'),
            'prescribed_by' => Auth::user()->getAuthIdentifierName()
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

        return view('forms.oral.index', ['patients' => $patients]);

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
        return View('forms.oral.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $oral = Oral::find($id);
        $oral -> delete();
        return redirect()->back();
    }
}
