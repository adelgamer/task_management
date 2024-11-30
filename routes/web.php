<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TasksController;

Route::get('/', function () {
    return view('dashboard');
})->name("dashboard")->middleware("auth");

// Users account actions
Route::get('/users', [UsersController::class, 'index'])->name("users.index")->middleware("auth");

Route::get('/users/create', [UsersController::class, 'create'])->name("users.create")->middleware("auth");

Route::get('/login-page', function () {
    return view("users.login");
})->name("login");

Route::post("login", [UsersController::class, 'login'])->name('users.login-attempt');

Route::get("logout", [UsersController::class, "logout"])->name("logout")->middleware("auth");

Route::get("/users/{user}/edit", [UsersController::class, "edit"])->name("users.edit")->middleware("auth");

Route::put('/users/{user}', [UsersController::class, 'update'])->name('users.update')->middleware('auth');

Route::post("/users", [UsersController::class, 'store'])->name('users.store')->middleware('auth');

Route::get("tasks", [TasksController::class, "index"])->name("tasks.index")->middleware("auth");

Route::get("/tasks/create", [TasksController::class, "create"])->name("tasks.create")->middleware("auth");

Route::post("/tasks/store", [TasksController::class, "store"])->name("tasks.store")->middleware("auth");

Route::get("/tasks/{task}", [TasksController::class, "show"])->name("tasks.show")->middleware("auth");

Route::delete("/tasks/{tasks}", [TasksController::class, "destroy"])->name("tasks.destroy")->middleware("auth");

Route::get("/tasks/{task}", [TasksController::class, "show"])->name("tasks.show")->middleware("auth");

Route::get("/tasks/{task}/edit", [TasksController::class, "edit"])->name("tasks.edit")->middleware("auth");
