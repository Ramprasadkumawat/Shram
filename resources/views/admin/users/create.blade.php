@extends('layouts.contentNavbarLayout')

@section('title', 'Create User')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">User Management /</span> Create User</h4>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create New User</h5>
        <a href="{{ route('users.index') }}" class="btn btn-primary">Back to Users</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('users.store') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="first_name" class="form-label">First Name</label>
                    <input class="form-control" type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" autofocus />
                    @error('first_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input class="form-control" type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" />
                    @error('last_name')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="email" class="form-label">E-mail</label>
                    <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="mobile_number" class="form-label">Mobile Number</label>
                    <input type="text" id="mobile_number" name="mobile_number" class="form-control" value="{{ old('mobile_number') }}" />
                    @error('mobile_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="aadhar_number" class="form-label">Aadhar Number</label>
                    <input class="form-control" type="text" id="aadhar_number" name="aadhar_number" value="{{ old('aadhar_number') }}" />
                    @error('aadhar_number')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="age" class="form-label">Age</label>
                    <input type="number" id="age" name="age" class="form-control" value="{{ old('age') }}" />
                    @error('age')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="type" class="form-label">User Type</label>
                    <select id="type" name="type" class="select2 form-select">
                        <option value="">Select User Type</option>
                        <option value="admin" {{ old('type') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ old('type') == 'staff' ? 'selected' : '' }}>Staff</option>
                        <option value="owner" {{ old('type') == 'owner' ? 'selected' : '' }}>Owner</option>
                    </select>
                    @error('type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" id="password" name="password" class="form-control" />
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" />
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Create User</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
