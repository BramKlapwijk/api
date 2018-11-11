<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $view = view('users.index');

        $view->users = User::all();

        return $view;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->user()->can('create users')) {
            return view('users.create');
        }
        return abort(403);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|unique:users'
        ]);

        $fields = $request->except('_token');

        if (!empty($fields['password'])) {
            $fields['password'] = bcrypt($fields['password']);
        }
        User::create($fields);

        return redirect('/users')->with('success', 'User is created');
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
        if (auth()->user()->can('edit users')) {
            $view = view('users.edit');

            $view->user = User::find($id);
            $view->permissions = Permission::all();

            return $view;
        }
        abort(403);
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
        if (!auth()->user()->can('edit users')) {
            abort(403);
        }
        $request->validate([
            'email' => 'email'
        ]);

        $user = User::find($id)->fill($request->except('_token'));
        $user->save();

        $user->syncPermissions($request->get('permissions'));

        return redirect('users')->with('success', 'User is saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->can('delete users')) {
            return ['status' => 'danger', 'message' => 'You dont the permission to do this'];
        }

        User::find($id)->delete();

        return ['status' => 'success', 'message' => 'User is deleted'];
    }
}
