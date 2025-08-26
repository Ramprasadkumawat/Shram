@extends('layouts.contentNavbarLayout')

@section('title', 'Create New Post')

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Post Management /</span> Create New Post</h4>

@php
    use App\Constants\AdminConstants;
    use App\Models\User; // To fetch owners for the dropdown
    $owners = User::where('type', AdminConstants::USER_TYPE_OWNER)->get();
@endphp

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Create Post</h5>
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back to Posts</a>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('posts.store') }}">
            @csrf
            <div class="row">
                <div class="mb-3 col-md-6">
                    <label for="owner_id" class="form-label">Owner</label>
                    <select id="owner_id" name="owner_id" class="select2 form-select">
                        <option value="">Select Owner</option>
                        @foreach ($owners as $owner)
                            <option value="{{ $owner->id }}" {{ old('owner_id') == $owner->id ? 'selected' : '' }}>{{ $owner->first_name }} {{ $owner->last_name }}</option>
                        @endforeach
                    </select>
                    @error('owner_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Title</label>
                    <input class="form-control" type="text" id="title" name="title" value="{{ old('title') }}" autofocus />
                    @error('title')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="description" class="form-label">Description</label>
                    <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="required_labours" class="form-label">Required Labours</label>
                    <input class="form-control" type="number" id="required_labours" name="required_labours" value="{{ old('required_labours') }}" />
                    @error('required_labours')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="location" class="form-label">Location</label>
                    <input class="form-control" type="text" id="location" name="location" value="{{ old('location') }}" />
                    @error('location')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="start_date" class="form-label">Start Date</label>
                    <input class="form-control" type="date" id="start_date" name="start_date" value="{{ old('start_date') }}" />
                    @error('start_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="end_date" class="form-label">End Date</label>
                    <input class="form-control" type="date" id="end_date" name="end_date" value="{{ old('end_date') }}" />
                    @error('end_date')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="work_type" class="form-label">Work Type</label>
                    <select id="work_type" name="work_type" class="select2 form-select">
                        <option value="">Select Work Type</option>
                        <option value="daily" {{ old('work_type') == 'daily' ? 'selected' : '' }}>Daily</option>
                        <option value="hourly" {{ old('work_type') == 'hourly' ? 'selected' : '' }}>Hourly</option>
                    </select>
                    @error('work_type')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="wage_per_day" class="form-label">Wage Per Day</label>
                    <input class="form-control" type="number" step="0.01" id="wage_per_day" name="wage_per_day" value="{{ old('wage_per_day') }}" />
                    @error('wage_per_day')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="wage_per_hour" class="form-label">Wage Per Hour</label>
                    <input class="form-control" type="number" step="0.01" id="wage_per_hour" name="wage_per_hour" value="{{ old('wage_per_hour') }}" />
                    @error('wage_per_hour')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <select id="status" name="status" class="select2 form-select">
                        <option value="">Select Status</option>
                        <option value="{{ AdminConstants::POST_STATUS_OPEN }}" {{ old('status') == AdminConstants::POST_STATUS_OPEN ? 'selected' : '' }}>Open</option>
                        <option value="{{ AdminConstants::POST_STATUS_IN_PROGRESS }}" {{ old('status') == AdminConstants::POST_STATUS_IN_PROGRESS ? 'selected' : '' }}>In Progress</option>
                        <option value="{{ AdminConstants::POST_STATUS_CLOSED }}" {{ old('status') == AdminConstants::POST_STATUS_CLOSED ? 'selected' : '' }}>Closed</option>
                    </select>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Create Post</button>
                <button type="reset" class="btn btn-outline-secondary">Reset</button>
            </div>
        </form>
    </div>
</div>
@endsection
