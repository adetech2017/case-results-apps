@extends('layouts.main')

@section('content')
<!-- Page Heading -->
<h1 class="h3 mb-4 text-gray-800">Update User</h1>

<div class="row">
    <div class="col-lg-8">
        <!-- Circle Buttons -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Edit User</h6>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @php
                $splitName = explode(' ', $user->name, 2);

                $first_name = $splitName[0];
                $last_name = !empty($splitName[1]) ? $splitName[1] : '';
            @endphp
            <form action="{{ url('admin/update-user', $user->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control" value="{{ $first_name }}" name="firstName">
                                <input type="hidden" value="{{ $user->id }}" name="id">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" value="{{ $user->email}}" name="email" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control" value="{{ $last_name }}" name="lastName">
                            </div>
                            <div class="form-group">
                                <label>Role Name</label>
                                <select class="form-control" name="role_id">
                                    <option value="{{ $user->roles[0]->id }}">{{ $user->roles[0]->display_name }}</option>
                                    @foreach ($role as $role)
                                        <option value="{{$role->id}}">{{$role->display_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>New Password</label>
                                <input type="password" class="form-control" placeholder="Enter password" name="password">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
