<?php

namespace App\Http\Controllers;
use App\Oral;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Patient;

class OralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $patients = DB::table('patients')
            ->where('status', '=', 'yes')
            ->where(function ($query) {
                $query->where('live', '=', 'alive');
            })
            ->get();

        return view('forms.oral.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(array $data, Request $mrn)
    {
        $oral = Oral::create([
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

        return view('forms.oral.show', compact('oral'));
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
        $oral = Oral::find($id);
        return view('forms.oral.show',array('oral' => $oral));
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
        $arr['patient'] = $mrn;
        return view('forms.stat_doses.create', compact('patient'));
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

        //dd($task); //--> for debugging
        $oral -> delete();
        return redirect()->back();
    }
}
