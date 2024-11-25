@extends('layout.layout')

@section('title', 'Edit user')

@section('content')
    <h1 class="h1 fw-bold">{{ __('text.edit') . ' ' . $user->username }}</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('text.users') }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.edit', $user->id) }}">{{ __('text.edit') }}</a></li>
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

    <div class="row">
        <div class="mb-3 w-75">
            <form method="POST" action="{{route('users.update', $user->id)}}">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label fw-bold">{{ __('text.name') }}</label>
                    <input name="name" type="text" class="form-control" id="name" aria-describedby="name"
                        value="{{ old('name') ?? $user->name }}">
                </div>
                <div class="mb-3">
                    <label for="family_name" class="form-label fw-bold">{{ __('text.family_name') }}</label>
                    <input name="family_name" type="text" class="form-control" id="family_name"
                        value="{{ old('family_name') ?? $user->family_name }}">
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label fw-bold">{{ __('text.username') }}</label>
                    <input name="username" type="text" class="form-control" id="username" aria-describedby="username"
                        value="{{ old('username') ?? $user->username }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label fw-bold">{{ __('text.password') }}</label>
                    <input name="password" type="password" class="form-control" id="password"
                        value="{{ old('password') }}">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('text.update') }}</button>
            </form>
        </div>
    </div>
@endsection
