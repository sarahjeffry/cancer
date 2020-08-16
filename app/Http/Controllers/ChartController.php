<?php

namespace App\Http\Controllers;

use App\Chart;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChartController extends Controller
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
        return view('forms.charts.show',['patients' => $patients])->with('message', 'You have successfully added the record!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        Chart::create([
            'patient_id' => request('id'),
            'treatment' => request('treatment'),
            'iv_infusion'  => request('iv_infusion'),
            'diet' => request('diet'),
            'chart_img' => request('chart_img'),
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

        return view('forms.charts.index', ['patients' => $patients]);
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
        return View('forms.charts.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $chart = Chart::find($id);
        $chart -> delete();
        return redirect()->back();
    }
}
