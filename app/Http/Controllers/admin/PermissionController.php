<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\CustomPermission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $n['permissions'] = CustomPermission::with(['created_user'])->where('deleted_at', null)->latest()->get();
        return view('admin.permission.view',$n);
    }
}
