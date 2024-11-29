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
                        <td style="font-size: 0.8rem">{{ $task->getPriority->name_en ?? 'Not determined' }}</td>
                        <td style="font-size: 0.8rem">{{ $task->creator->name . ' ' . $task->creator->family_name }}</td>
                        <td>
                            <div class="row">
                                <div class="col-12">
                                    <a style="font-size: 0.8rem" class="btn btn-warning fw-bold btn-sm"
                                        href="{{ route('tasks.show', $task->id) }}"
                                        role="button">{{ __('text.view') }}</a>
                                    <a style="font-size: 0.8rem" class="btn btn-primary fw-bold btn-sm" href=""
                                        role="button">{{ __('text.edit') }}</a>

                                    <form action="{{ route('tasks.destroy', $task->id) }}" method="post" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <input style="font-size: 0.8rem" type="submit"
                                            class="btn btn-danger fw-bold btn-sm" role="button"
                                            value="{{ __('text.delete') }}"></a>
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
