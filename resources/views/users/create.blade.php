@extends('layout.layout')
@section('title', __('text.add_user'))

@section('content')

    <h1 class="h1 fw-bold">{{ __('text.create_account') }}</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('text.users') }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">{{ __('text.add_user') }}</a></li>
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


    <div class="mb-3 w-75">
        <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('text.name') }}</label>
                <input value="{{ old('name') }}" name="name" type="text" class="form-control" id="name"
                    aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="family" class="form-label">{{ __('text.family_name') }}</label>
                <input value="{{ old('family_name') }}" name="family_name" type="text" class="form-control"
                    id="family">
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">{{ __('text.username') }}</label>
                <input value="{{ old('username') }}" name="username" type="text" class="form-control" id="username"
                    aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">{{ __('text.email') }}</label>
                <input value="{{ old('email') }}" name="email" type="email" class="form-control"
                    id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">{{ __('text.password') }}</label>
                <input value="{{ old('password') }}" name="password" type="password" class="form-control" id="password">
            </div>

            <div class="mb-3">
                <label for="formFile" class="form-label fw-bold">Profile image</label>
                <input name="profile_image" class="form-control" type="file" id="formFile" accept="image/*">
            </div>
            <button type="submit" class="btn btn-primary">{{ __('text.create') }}</button>
        </form>
    </div>

@endsection
