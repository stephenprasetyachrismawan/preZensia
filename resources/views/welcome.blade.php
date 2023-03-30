<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>



    <!-- Styles -->


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daisyui@2.51.4/dist/full.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    @vite('resources/css/app.css')

</head>

<body class="antialiased">
    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <a href="{{ route('login') }}">
            <div class="btn btn-primary">Login</div>
        </a>

        <h1 class="text-3xl font-bold underline">
            Hello world!
        </h1>
    </div>
</body>

</html>
