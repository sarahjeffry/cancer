<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\True_;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $id)
    {
        $user = User::all();
//        $user = User::find($id);
        return view('settings.index', compact('user'));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        User::create([
            'name' => $request['name'],
            'role'  => $request['role'],
            'staff_id' => $request['staff_id'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        return redirect()->back()->with('message', 'You have successfully added a new user!');
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
    public function show()
    {
        $users = DB::table('users')->where([
            ['role', '=', 'nurse']
        ])->orWhere([
            ['role','=', 'consultant']
        ])->get();

//        dd($users);
        return view('user_management.index', ['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::find($id);
//        $arr['user'] = $user;
        return view('user_management.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
//
        $user->update([
            'name'      => $request->name, //'view'  => $request->column in database
            'role'     => $request->role,
            'email'     => $request->email,
            'staff_id'     => $request->staff_id,
        ]);

        return redirect()->back()->with('message', 'You have successfully updated the record!');
//        return view('settings.index')->with(['message' => 'You have successfully updated your profile!', 'alert' => 'alert-success']);
//        dd("Updated");
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
        return redirect()->back()->with('message', 'You have deleted a record.');
    }
}
