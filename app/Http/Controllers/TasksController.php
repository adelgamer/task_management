<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskStatus;
use App\Models\TaskPriority;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Session;

class TasksController extends Controller
{
    public function index()
    {

        $tasks = Task::all();
        return view("tasks.index", ["tasks" => $tasks]);
    }

    public function create()
    {
        $statuses = TaskStatus::all();
        $priorities = TaskPriority::all();
        $users = User::all();
        $data = [
            "statuses" => $statuses,
            "priorities" => $priorities,
            "users" => $users
        ];
        return view("tasks.create", $data);
    }

    public function store(Request $request)
    {

        $title = $request->title;
        $description = $request->description;
        $due_date = $request->due_date;
        $completion_date = $request->completion_date;
        $status = $request->status_id;
        $priority = $request->priority_id;
        $assignee_id = $request->assignee_id;

        $validation = $request->validate([
            "title" => "required|max:255|min:3",
            "description" => "nullable|min:3",
            "due_date" => "required|date",
            "completion_date" => "nullable|date",
            "status_id" => "required|digits_between:1,9||exists:task_status,id",
            "assignee_id" => "required|exists:users,id",
        ]);

        // Storing the task
        Task::create([
            "title" => $title,
            "description" => $description,
            "due_date" => $due_date,
            "completion_date" => $completion_date ?? null, // If no completion_date, set as NULL
            "status" => $status,
            "priority" => $priority ?? null, // Default to 1 if priority is not provided
            "assigned_to" => $assignee_id,
            "created_by" => Session::get("user")->id
        ]);



        return $this->index();
    }

    public function show($id){
        return "See: " . $id;
    }
}