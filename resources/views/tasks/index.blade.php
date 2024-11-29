@php
    function priorityColor($priorityId = 1)
    {
        switch ($priorityId) {
            case 1:
                return 'background-color: green; color: white; font-weight: 800;';
                break;
            case 2:
                return 'background-color: yellow; color: black; font-weight: 800;';
                break;
            case 3:
                return 'background-color: orange; color: black; font-weight: 800;';
                break;
            case 4:
                return 'background-color: red; color: white; font-weight: 800;';
                break;

            default:
                return 'background-color: white; color: black; font-weight: 800;';
                break;
        }
    }
@endphp

@extends('layout.layout')

@section('title', __('text.tasks'))

@section('content')

    <h1 class="h1 fw-bold">{{ __('text.tasks') }}</h1>

    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="{{ route('tasks.index') }}">{{ __('text.tasks') }}</a></li>
        </ol>
    </nav>
    <div class="row mb-4 justify-content-end">
        <div class="col-auto">
            <a class="btn btn-primary " href="{{ route('tasks.create') }}" role="button">{{ __('text.add_task') }}</a>
        </div>

    </div>

    <div class="row px-2">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.title') }}</th>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.due_date') }}</th>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.completion_date') }}</th>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.status') }}</th>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.priority') }}</th>
                    <th scope="col" style="font-size: 0.8rem">{{ __('text.assignee') }}</th>
                    <th scope="col" style="font-size: 0.8rem"><b>{{ __('text.actions') }}</b></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr style="height: 5vh;">
                        <td style="font-size: 0.8rem; width: 20%;">{{ $task->title }}</td>
                        <td style="font-size: 0.8rem">{{ $task->due_date }}</td>
                        <td style="font-size: 0.8rem">{{ __('text.not_finished') }}</td>
                        <td style="font-size: 0.8rem">{{ $task->getStatus->name_en ?? 'Not determined' }}</td>
                        <td style="font-size: 0.8rem; {{ priorityColor($task->getPriority->id ?? 1) }}">
                            {{ $task->getPriority->name_en ?? 'Not determined' }}</td>
                        <td style="font-size: 0.8rem">{{ $task->assignedTo->name . ' ' . $task->assignedTo->family_name }}
                        </td>
                        <td>
                            <div class="dropdown">
                                <a class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    ...
                                </a>

                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item"
                                            href="{{ route('tasks.show', $task->id) }}">{{ __('text.view') }}</a></li>
                                    <li><a class="dropdown-item" href="#">{{ __('text.edit') }}</a></li>
                                    <li>
                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <input class="dropdown-item" type="submit"
                                                value="{{ __('text.delete') }}"></input>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
