<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Role;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //
    public function dashboard()
    {
        $catigories = Category::all();
        $servecis = Service::all();
        return view('super-admin.dashboard' , compact(["catigories","servecis"]));
    }

    public function users()
    {
        $users = User::with('roles')->where('role','!=',1)->get();
        return view('super-admin.users', compact('users'));
    }

    public function manageRole()
    {
        $users = User::where('role','!=',1)->get();
        $roles = Role::all();
        return view('super-admin.manage-role', compact(['users','roles']));
    }

    public function updateRole(Request $request)
    {
        User::where('id', $request->user_id)->update([
            'role' => $request->role_id
        ]);
        return redirect()->back();
    }

}
