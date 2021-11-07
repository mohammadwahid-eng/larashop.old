<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Larashop') }}</title>

        <!-- Favicon -->
        <link rel="icon" href="{{ asset('themes/admin/img/favicon.svg') }}">

        <!-- General CSS Files -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">

        <!-- CSS Libraries -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @stack('css_lib')

        <!-- Template CSS -->
        <link rel="stylesheet" href="{{ asset('themes/admin/css/style.css') }}">
        <link rel="stylesheet" href="{{ asset('themes/admin/css/components.css') }}">

        @stack('head')
    </head>

    <body>
        <div id="app">
            @yield('content')
        </div>

        <!-- General JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{ asset('themes/admin/js/stisla.js') }}"></script>
        <script>
            @if(Session::has('status'))
                toastr.success("{{ session('status') }}");
            @endif
        </script>

        <!-- JS Libraies -->
        @stack('js_lib')

        <!-- Template JS File -->
        <script src="{{ asset('themes/admin/js/scripts.js') }}"></script>
        <script src="{{ asset('themes/admin/js/custom.js') }}"></script>

        <!-- Page Specific JS File -->
        @stack('footer')
    </body>
</html>
