@extends('layouts.contentNavbarLayout')

@section('title', 'Posts List')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Post Management /</span> Posts List</h4>

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
        <h5 class="mb-0">Posts</h5>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Add New Post</a>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.index') }}" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="search" class="form-control" placeholder="{{ AdminConstants::POST_LIST_SEARCH_PLACEHOLDER }}" value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="sort_by" class="form-select">
                        <option value="">Sort By</option>
                        <option value="title" {{ request('sort_by') == 'title' ? 'selected' : '' }}>{{ AdminConstants::POST_LIST_SORT_BY_TITLE }}</option>
                        <option value="owner_name" {{ request('sort_by') == 'owner_name' ? 'selected' : '' }}>{{ AdminConstants::POST_LIST_SORT_BY_OWNER_NAME }}</option>
                        <option value="created_at" {{ request('sort_by') == 'created_at' ? 'selected' : '' }}>{{ AdminConstants::POST_LIST_SORT_BY_CREATED_AT }}</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort_order" class="form-select">
                        <option value="asc" {{ request('sort_order') == 'asc' ? 'selected' : '' }}>{{ AdminConstants::POST_LIST_SORT_ORDER_ASC }}</option>
                        <option value="desc" {{ request('sort_order') == 'desc' ? 'selected' : '' }}>{{ AdminConstants::POST_LIST_SORT_ORDER_DESC }}</option>
                    </select>
                </div>
                <div class="col-md-12 mt-3">
                    <button type="submit" class="btn btn-primary">{{ AdminConstants::POST_LIST_SEARCH_SORT_BUTTON }}</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-secondary">{{ AdminConstants::POST_LIST_CLEAR_BUTTON }}</a>
                </div>
            </div>
        </form>

        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_ID }}</th>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_OWNER }}</th>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_TITLE }}</th>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_LOCATION }}</th>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_STATUS }}</th>
                        <th>{{ AdminConstants::POST_LIST_TABLE_HEADER_ACTIONS }}</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->owner->first_name ?? 'N/A' }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->location }}</td>
                            <td><span class="badge bg-label-{{ $post->status == 'open' ? 'success' : ($post->status == 'in_progress' ? 'warning' : 'danger') }} me-1">{{ ucfirst($post->status) }}</span></td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ route('posts.edit', $post->id) }}">
                                        <i class="bx bx-edit-alt me-1"></i> {{ AdminConstants::POST_LIST_ACTION_EDIT }}
                                    </a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline;" class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item delete-button"><i class="bx bx-trash me-1"></i> {{ AdminConstants::POST_LIST_ACTION_DELETE }}</button>
                                    </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">{{ AdminConstants::POST_LIST_NO_POSTS_FOUND }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $posts->links() }}
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
        {{ AdminConstants::MODAL_POST_CONFIRM_DELETION_BODY }}
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
