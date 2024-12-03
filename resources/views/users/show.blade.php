@extends('layout.layout')

@section('title', 'Show')

@section('content')
    <h1 class="h1 fw-bold">{{ $user->family_name . ' ' . $user->name }}</h1>
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">{{ __('text.users') }}</a></li>
            <li class="breadcrumb-item active"><a href="{{ route('users.show', $user->id) }}">{{ __('text.profile') }}</a>
            </li>
        </ol>
    </nav>
    <div class="row justify-content-center">
        <div class="col-12 mt-3">
            <div></div><img class="w-25" src="{{ asset('images/man.png') }}" alt="">
        </div>
        <div class="col-12 mt-5 fs-2">
            <p class="fw-bold">{{ $user->family_name . ' ' . $user->name }}</p>
        </div>
        <div class="col-12 fw-bolder">
            <p class="">{{ $user->username }}</p>
        </div>
        <div class="col-12 fw-medium">
            <p>{{ $user->getGroup->name_en }}</p>
        </div>
        <div class="col-12 ">
            <p>{{ $user->email }}</p>
        </div>
    </div>
    <div class="row justify-content-end w-100 mb-5">
        <div class="col-auto">
            <a class="btn btn-primary" href="{{ route('users.edit', $user->id) }}">{{ __('text.edit') }}</a>
        </div>
    </div>
@endsection
