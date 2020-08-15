<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
//        User::create([
//            'name' => $request['name'],
//            'role'  => $request['role'],
//            'staff_id' => $request['staff_id'],
//            'email' => $request['email'],
//            'password' => Hash::make($request['password']),
//        ]);
//
//        return view('user_management.index');
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
    public function edit(User $user)
    {
        $user = User::find($user->id);
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
            'email'     => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return view('settings.index')
            ->with('message', 'You have successfully updated your profile!');
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
        $user = User::find($id); //object

        $user -> delete();
        return redirect()->back()->with('message', 'You have successfully updated your profile!');;
    }
}
