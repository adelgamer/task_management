<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> @yield('title') </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="container-fluid">
    <div class="row">
        <div id="side-bar" class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark col-3"
            style="height: 100vh;">
            <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <span class="fs-4 fw-bold">Task Manager</span>
            </a>
            <hr />
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="/"
                        class="nav-link text-white {{ Route::current()->getName() == 'dashboard' ? 'active' : '' }}"
                        aria-current="page">
                        <i class="bi bi-speedometer" style="margin-right: 10px;"></i>
                        {{__('text.dashboard')}}
                    </a>
                </li>
                <li>
                    <a href="#tasks" class="nav-link text-white">
                        <i class="bi bi-list-task" style="margin-right: 10px;"></i>
                        {{__('text.tasks')}}
                    </a>
                </li>
                <li>
                    <a href="#teams" class="nav-link text-white">
                        <i class="bi bi-microsoft-teams" style="margin-right: 10px;"></i>
                        {{__('text.teams')}}
                    </a>
                </li>
                <li>
                    <a href="{{route("users.index")}}" class="nav-link text-white {{ Route::current()->getName() == 'users.index' ? 'active' : '' }}">
                        <i class="bi bi-people" style="margin-right: 10px;"></i>
                        {{__('text.users')}}
                    </a>
                </li>
            </ul>
            <hr />
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
                    id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ asset('images/man.png') }}" alt="" width="32" height="32"
                        class="rounded-circle me-2" />
                    <strong>{{ Session::get('user')->username }}</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">{{__('text.settings')}}</a></li>
                    <li><a class="dropdown-item" href="#">{{__('text.profile')}}</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}">{{__('text.sign_out')}}</a></li>
                </ul>
            </div>
        </div>

        <!-- Content -->
        <div class="col-9" style="overflow-y: auto; height: 100vh; padding-left: 25px; padding-top: 25px;">
            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>

</html>
