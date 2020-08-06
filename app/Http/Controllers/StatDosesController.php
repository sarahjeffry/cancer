<?php

namespace App\Http\Controllers;

use App\Patient;
use App\StatDoses;
use App\User;
use Illuminate\Http\Request;

class StatDosesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        $patients = Patient::all();
        return view('forms.stat_doses.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function create(array $data, Request $mrn)
    {

        $statdose = StatDoses::create([
            'name' => $data['name'],
            'gender' => $data['gender'],
            'mrn'  => $mrn,
            'type' => $data['type'],
            'height' => $data['height'],
            'weight' => $data['weight'],
            'smoking' => $data['smoking'],
            'status' => $data['status'],
            'live' => $data['live'],
            'year' => 2020

        ]);

        return view('forms.stat_doses.show', compact('statdose'));
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
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    protected function update(Request $mrn)
    {
        $arr['patient'] = $mrn;
        return view('forms.stat_doses.create', compact('patient'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
