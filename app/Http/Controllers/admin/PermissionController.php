<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\CustomPermission;
use App\Http\Requests\PermissionRequest;
use Carbon\Carbon;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $n['permissions'] = CustomPermission::with(['created_user'])->where('deleted_at', null)->orderBy('prefix')->latest()->get();
        return view('admin.user.permission.view',$n);
    }
    public function create(){
        return view('admin.user.permission.create');
    }
    public function store(PermissionRequest $request){
        $permission = Permission::create(['name' => $request->name, 'prefix' => $request->prefix, 'created_by' => auth()->user()->id, 'created_at' => Carbon::now()->toDateTimeString()]);
        $this->message('success', 'Permission Created Successfullly');
        return redirect()->route('permission.view');
    }
    public function edit($id=null){
        if($id!=null){
            $n['permission'] = Permission::findOrFail($id);
            return view('admin.user.permission.edit', $n);
        }
    }
    public function update(Request $request, $id){
        $permission = CustomPermission::findOrFail($id);
        $permission->name = $request->name;
        $permission->prefix = $request->prefix;
        $permission->updated_at = Carbon::now()->toDateTimeString();
        $permission->updated_by = auth()->user()->id;
        $permission->save();

        $this->message('success', 'Permission Updated Successfullly');
        return redirect()->route('permission.view');
    }
    public function delete($id=null){
        if($id!=null){
            $permission = CustomPermission::findOrFail($id);
            $permission->deleted_at = Carbon::now()->toDateTimeString();
            $permission->deleted_by = auth()->user()->id;
            $permission->save();
            $this->message('success', 'Permission '.$permission->name.' deleted successfully');
            return redirect()->route('permission.view');
        }
    }
}
