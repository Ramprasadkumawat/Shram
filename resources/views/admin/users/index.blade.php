@extends('layouts.contentNavbarLayout')

@section('title', 'Users List')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">User Management /</span> Users List</h4>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Users</h5>
        <a href="{{ route('admin.users.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.users.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="Search by name or email" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="">Sort By</option>
                        <option value="first_name" {{ request('sort_by') == 'first_name' ? 'selected' : '' }}>First Name</option>
                        <option value="last_name" {{ request('sort_by') == 'last_name' ? 'selected' : '' }}>Last Name</option>
                        <option value="email" {{ request('sort_by') == 'email' ? 'selected' : '' }}>Email</option>
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>Created At</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort_order" class="form-select">
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>ASC</option>
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>DESC</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">Search & Sort</button>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary">Clear</a>
                </div>
            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Mobile</th>
                        <th>Aadhar</th>
                        <th>Age</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }} {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ ucfirst($user->type) }}</td>
                            <td>{{ $user->mobile_number ?? '-' }}</td>
                            <td>{{ $user->aadhar_number ?? '-' }}</td>
                            <td>{{ $user->age ?? '-' }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ route('admin.users.edit', $user->id) }}"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item"><i class="bx bx-trash me-1"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $users->links() }}
        </div>
    </div>
</div>
@endsection
