<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $data['users']= User::with(['created_user','role'])->where('deleted_at', null)->latest()->get();
        return view('admin.user.view',$data);
    }
    public function create(){
        $data['roles'] = Role::where('deleted_at', null)->latest()->get();
        return view('admin.user.create',$data);
    }
    public function store(UserRequest $request){
        $insert = new User;
        $insert->name = $request->name;
        $insert->email = $request->email;
        $insert->role_id = $request->role_id;
        $insert->password = Hash::make($request->password);
        $insert->created_at = Carbon::now()->toDateTimeString();
        $insert->created_by = auth()->user()->id;
        $insert->save();
        session()->flash('success', 'User Created successfully!');
        return redirect()->route('user.view');
    }
}
