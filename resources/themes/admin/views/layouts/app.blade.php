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
        <link rel="stylesheet" href="{{ asset('themes/admin/css/custom.css') }}">

        @stack('head')
    </head>

    <body>
        <div id="app">
			<div class="main-wrapper main-wrapper-1">
				@include('layouts.header.index')
				@include('layouts.partials.sidebar')
				<div class="main-content">
					<section class="section">
						<div class="section-header">
							<h1 class="mt-0 align-items-center d-inline-flex">@yield('title', 'Title') @yield('title_add_new_btn')</h1>
							@yield('breadcrumbs')
						</div>
					</section>
					@yield('content')
				</div>
				@include('layouts.footer.index')
			</div>
        </div>

        <!-- General JS Scripts -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
        <script src="{{ asset('themes/admin/js/stisla.js') }}"></script>
        <script>
            toastr.options.timeOut = 1800;
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
