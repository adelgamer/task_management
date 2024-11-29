@extends('layout.layout')

@section('title', __('text.add_task'))

@section('content')
    <h1 class="h1 fw-bold">{{ __('text.add_task') }}</h1>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">{{ __('text.tasks') }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('tasks.create') }}">{{ __('text.add_task') }}</a></li>
        </ol>
    </nav>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <div class="row w-75">
            <div class="mb-3 col-12">
                <label for="title" class="form-label">{{ __('text.title') }} <span style="color: red">*</span></label>
                <input name="title" type="text" class="form-control" id="title" max="255"
                    value="{{ old('title') }}">
            </div>
            <div class="mb-3 col-12">
                <label for="description" class="form-label">{{ __('text.enter_description') }}</label>
                <textarea name="description" class="form-control" id="description" rows="3">{{ old('description') }}</textarea>
            </div>
        </div>
        <div class="row w-75">
            <div class="col-8">
                <label for="due_date">{{ __('text.due_date') }} <span style="color: red">*</span></label>
                <input name="due_date" id="due_date" class="form-control" type="date" value="{{ old('due_date') }}" />
            </div>
            <div class="col-4">
                <label for="completion_date">{{ __('text.completion_date') }}</label>
                <input name="completion_date" id="completion_date" class="form-control" type="date"
                    value="{{ old('completion_date') }}" />
            </div>
        </div>
        <div class="row w-75 mt-4">
            <div class="col-6">
                <label for="">{{ __('text.select_status') }} <span style="color: red">*</span></label>
                <select name="status_id" class="form-select" aria-label="{{ __('text.select_status') }}">
                    <option>{{ __('text.select_status') }}</option>
                    @foreach ($statuses as $status)
                        <option value="{{ $status->id }}" {{ $status->id == old('status_id') ? 'selected' : '' }}>
                            {{ $status->name_en }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-6">
                <label for="">{{ __('text.select_priority') }} <span style="color: red">*</span></label>
                <select name="priority_id" class="form-select" aria-label="{{ __('text.select_priority') }}">
                    <option>{{ __('text.select_priority') }}</option>
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}" {{ $priority->id == old('priority_id') ? 'selected' : '' }}>{{ $priority->name_en }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="row w-75 mt-4">
            <div class="col-12">
                <label for="">{{ __('text.select_assignee') }} <span style="color: red">*</span></label>
                <select name="assignee_id" class="form-select" aria-label="{{ __('text.select_assignee') }}">
                    <option selected>{{ __('text.select_assignee') }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ $user->id == old('assignee_id') ? 'selected' : '' }}>{{ $user->name . ' ' . $user->family_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <input class="btn btn-primary mt-3 mb-5" type="submit" value="{{ __('text.add_task') }}">
    </form>
@endsection
