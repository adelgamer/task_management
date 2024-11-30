<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskStatus;
use App\Models\TaskPriority;
use App\Models\User;
use App\Models\Task;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
    public function index()
    {

        $tasks = Task::orderBy("id", "desc")->get();
        $can_delete_task = Gate::allows("delete_task");
        $can_add_task = Gate::allows("add_task");
        return view("tasks.index", ["tasks" => $tasks], ["can_delete_task" => $can_delete_task, "can_add_task" => $can_add_task]);
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
            "title" => "required|max:255|min:3|unique:tasks",
            "description" => "nullable|min:3",
            "due_date" => "required|date",
            "completion_date" => "nullable|date",
            "status_id" => "required|digits_between:1,9|exists:task_status,id",
            "priority_id" => "required|digits_between:1,4|exists:task_priority,id",
            "assignee_id" => "required|exists:users,id",
        ]);

        // Checking role
        if (!Gate::allows("add_task")) {
            abort(403, "You don't have permission to add a task");
        };

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



        return redirect()->route("tasks.index");
    }

    public function show($id)
    {
        $task = Task::find($id);
        return view("tasks.show", ["task" => $task]);
    }

    public function destroy($id)
    {

        if (!Gate::allows("delete_task")) {
            abort(403, "You don't have permission to delete a task");
        }

        $task = Task::find($id);
        $task->delete();
        return redirect()->route("tasks.index");
    }

    public function edit($id){
        return "edit: " . $id;
    }
}
