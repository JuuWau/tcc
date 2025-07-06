<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $employes = User::select('users.*', 'permissions.type as permission_type')
            ->join('permissions', 'users.permission_id', '=', 'permissions.id')
            ->paginate(10);

        return view('employes.employes', compact('employes'));
    }

    public function create()
    {
        $permissions = Permission::all();

        return view('employes.employes-form', compact('permissions'));
    }
}
