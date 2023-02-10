<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = DB::table('users as u')
            ->select('u.name as fullName', 'u.id', 'u.email', 'r.name as role', 'phone_no')
            ->leftJoin('roles as r', 'u.role_id', '=', 'r.id')
            ->get();
        $roles = Role::pluck('name', 'id');
        return view('admin.users.allUsers', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $status = $user->delete();
        if ($status) {
            return response(['success' => "User deleted Successfully"]);
        }
        return response(['error' => "User not deleted."]);
    }

    public function updateRole(Request $request, $id)
    {
        $request->validate([
            'role' => 'required|exists:roles,id'
        ]);
        $status = User::where(['id' => $id])->update(['role_id' => $request['role']]);
        // dd($status);
        if ($status == 1) {
            return redirect()->back()->with('message', 'User role changed successfully!');
        } else {
            return redirect()->back()->with('error', 'Error. User role not changed.');
        }
    }
}
