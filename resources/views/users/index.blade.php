@extends('layout.layout')

@section('title', 'Users')

@section('content')
    <h1 class="h1 fw-bold">Users</h1>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('users.index') }}">{{__('text.users')}}</a></li>
        </ol>
    </nav>
    <div class="row mb-4 justify-content-end">
        <div class="col-auto">
            <a class="btn btn-primary " href="{{route('users.create')}}" role="button">{{__('text.add_user')}}</a>
        </div>
        
    </div>

    <div class="row px-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Group</th>
                    <th scope="col"><b>Actions</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->family_name }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone_number ?? '---' }}</td>
                        <td>Not yet</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <form action="{{ route('users.edit', $user->id) }}" method="get">
                                        <input class="btn btn-primary" type="submit" value="Edit">
                                    </form>

                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
