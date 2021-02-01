<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Xerv's Café</title>
    <link rel="shortcut icon" href="{{ asset('images/blacklogo.png') }}" />
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @livewireStyles
    <style>
        .material-icons.md-18 {
            font-size: 18px;
        }

        .material-icons.md-24 {
            font-size: 24px;
        }

        .material-icons.md-36 {
            font-size: 34px;
        }

        .material-icons.md-48 {
            font-size: 48px;
        }

    </style>
    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased overflow-hidden">
    @include('layouts.partials.navbar')
   @yield('content')

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    <x-livewire-alert::scripts />
</body>

</html>
