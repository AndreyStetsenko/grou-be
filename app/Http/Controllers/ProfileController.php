<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function __invoke()
    {
        $user = Auth::user();
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();

        return view('profile.profile', compact('roles', 'userRole'))->with('user', $user);
    }
}
