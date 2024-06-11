<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <meta
        http-equiv="X-UA-Compatible"
        content="ie=edge"
    >
    <title>@yield('title')</title>
    <link
        href="{{ asset('assets/css/styles.css') }}"
        rel="stylesheet"
    >
    <link
        href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}"
        rel="stylesheet"
    >
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('styles')
</head>
