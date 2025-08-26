@extends('layouts.contentNavbarLayout')

@section('title', 'Users List')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">User Management /</span> Users List</h4>

@php
use App\Constants\AdminConstants;
@endphp

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Users</h5>
        <a href="{{ route('users.create') }}" class="btn btn-primary">Add New User</a>
    </div>
    <div class="card-body">
        <form action="{{ route('users.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="{{ AdminConstants::USER_LIST_SEARCH_PLACEHOLDER }}" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="">Sort By</option>
                        <option value="first_name" {{ request('sort_by') == 'first_name' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_BY_FIRST_NAME }}</option>
                        <option value="last_name" {{ request('sort_by') == 'last_name' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_BY_LAST_NAME }}</option>
                        <option value="email" {{ request('sort_by') == 'email' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_BY_EMAIL }}</option>
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_BY_CREATED_AT }}</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort_order" class="form-select">
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_ORDER_ASC }}</option>
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>{{ AdminConstants::USER_LIST_SORT_ORDER_DESC }}</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">{{ AdminConstants::USER_LIST_SEARCH_SORT_BUTTON }}</button>
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">{{ AdminConstants::USER_LIST_CLEAR_BUTTON }}</a>
                </div>
            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_ID }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_NAME }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_EMAIL }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_TYPE }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_MOBILE }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_AADHAR }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_AGE }}</th>
                        <th>{{ AdminConstants::USER_LIST_TABLE_HEADER_ACTIONS }}</th>
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
                                    <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> {{ AdminConstants::USER_LIST_ACTION_EDIT }}
                                    </a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item delete-button"><i class="bx bx-trash me-1"></i> {{ AdminConstants::USER_LIST_ACTION_DELETE }}</button>
                                    </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">{{ AdminConstants::USER_LIST_NO_USERS_FOUND }}</td>
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

<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">{{ AdminConstants::MODAL_CONFIRM_DELETION_TITLE }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{ AdminConstants::MODAL_CONFIRM_DELETION_BODY }}
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ AdminConstants::MODAL_CANCEL_BUTTON }}</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteButton">{{ AdminConstants::MODAL_DELETE_BUTTON }}</button>
      </div>
    </div>
  </div>
</div>

@section('page-script')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        let deleteForm = null;
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function (event) {
                event.preventDefault();
                deleteForm = this.closest('.delete-form');
                const confirmDeleteModal = new bootstrap.Modal(document.getElementById('confirmDeleteModal'));
                confirmDeleteModal.show();
            });
        });

        document.getElementById('confirmDeleteButton').addEventListener('click', function () {
            if (deleteForm) {
                deleteForm.submit();
            }
        });
    });
</script>
@endsection
