<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sn = 1;
        $users = User::orderBy('id', 'DESC')->get();
        return view('admin.users.index', compact('users', 'sn'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ],
            [
                'name.required' => 'User Name is required image',
                'email.required' => 'Email is required',
                'role.required' => 'User role is required',
            ]
        );

      
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->avator = $request->avator;
            $user->role = $request->role;
            $save = $user->save();

        Session::flash('message', 'User added successfully');
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Church  $user
     * @return \Illuminate\Http\Response
     */
    public function show(Church $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Church  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Church  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
        ],
            [
                'name.required' => 'User Name is required image',
                'email.required' => 'Email is required',
                'role.required' => 'User role is required',
            ]
        );

      
            
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->avator = $request->avator;
            $user->role = $request->role;
            $save = $user->save();

        Session::flash('message', 'User updated successfully');
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Church  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        // Delete image files
        Storage::delete($user->avator);

        // Delete data from table
        $user->delete();

        Session::flash('delete-message', 'User revoved successfully');
        return redirect()->route('users.index');
    }
}
