@extends('layout.layout')

@section('title', 'Task: ' . $task->title)

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="h1 fw-bold">{{ $task->title }}</h1>
            
            <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">{{ __('text.tasks') }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a>
                    </li>
                </ol>
            </nav>
            <p class="lead">{{ $task->description }}</p>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th scope="row">Due date</th>
                        <td>{{ $task->due_date }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Completion date</th>
                        <td>{{ $task->completion_date ? $task->completion_date : '-' }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Status</th>
                        <td>{{ $task->getStatus->name_en }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Priority</th>
                        <td>{{ $task->getPriority->name_en ?? "-" }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Assigned to</th>
                        <td>{{ $task->assignedTo->name . ' ' . $task->assignedTo->family_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created by</th>
                        <td>{{ $task->creator->name . ' ' . $task->creator->family_name }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Created at</th>
                        <td>{{ $task->created_at }}</td>
                    </tr>
                    <tr>
                        <th scope="row">Updated at</th>
                        <td>{{ $task->updated_at }}</td>
                    </tr>
                </tbody>
            </table>
            <div class="row justify-content-end">
                <div class="col-auto">
                    <a class="btn btn-primary btn-sm" href="{{route('tasks.edit', $task->id)}}" role="button">{{__("text.edit")}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
