<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="container">

    <div class="row mt-5">
        <h1 class="fw-bold text-center">{{ __('text.login') }}</h1>
    </div>

    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="col-6 mt-5 mb-4 mx-auto">
            <form method="POST" action="{{ route('users.login-attempt') }}">
                @csrf
                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('text.username') }}</label>
                    <input name="username" type="text" class="form-control" id="username"
                        aria-describedby="username">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('text.password') }}</label>
                    <input name="password" type="password" class="form-control" id="password">
                </div>
                <button type="submit" class="btn btn-primary">{{ __('text.login') }}</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="jquery.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</body>

</html>
