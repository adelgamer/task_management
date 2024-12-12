<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use App\Models\Group;
use App\Models\GroupHasRight;
use App\Models\Right;
use App\Models\User;
use App\Policies\UserPolicy;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void {}

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define("add_task", function () {
            $user_group = Session::get("user")->group_id; // 1
            $group_has_role = GroupHasRight::where(["group_id" => $user_group, "right_id" => 1])->first()->has;

            return $group_has_role;
        });

        Gate::define("delete_task", function () {
            $user_group = Session::get("user")->group_id;
            $group_has_role = GroupHasRight::where(["group_id" => $user_group, "right_id" => 3])->first()->has;
            return $group_has_role;
        });
    }
}
