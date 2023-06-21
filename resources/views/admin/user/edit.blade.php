@extends('admin.layouts.master')
@section('title', 'My Dashboad')
@push('third-party-stylesheet')
@endpush
@push('css')
@endpush
@section('content')
<div class="col-md-12 ">
    <div class="x_panel">
        <div class="x_title">
            <h2>Edit User</h2>
            <ul class="nav navbar-right panel_toolbox">
                <li><a href='{{route('user.view')}}'><button class="btn btn-info">All User</button></a>
                </li>
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br />
            <form class="form-horizontal form-label-left" action="{{route('user.update',$user->id)}}" method="POST">
                @csrf

                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Name</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Enter name" name="name" value="{{ $user->name }}" required autofocus>
                    </div>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row ">
                    <label class="control-label col-md-3 col-sm-3 ">Email</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="Enter email" name="email" value="{{ $user->email }}" required>
                    </div>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Role</label>
                    <div class="col-md-9 col-sm-9 ">
                        <select class="form-control" name='role_id'>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @if($user->role_id == $role->id) selected @endif >{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group row">
                    <label class="control-label col-md-3 col-sm-3 ">Password</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="password"
                                class="form-control @error('password') is-invalid @enderror"
                                placeholder="Enter password" name="password">
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-9 col-sm-9  offset-md-3">
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

@endsection
@push('third-party-js')
@endpush
@push('js')
@endpush
