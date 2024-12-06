@extends('layout.layout')

@section('title', __('text.teams'))

@section('content')

    <h1 class="h1 fw-bold">{{ __('text.teams') }}</h1>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('teams.index') }}">{{ __('text.teams') }}</a></li>
        </ol>
    </nav>

    <div class="row px-2">
        Work in Progress...
    </div>


@endsection
