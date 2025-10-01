<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" name="viewport">
    <title>Dashboard &mdash; Ellie Store</title>

    <link rel="stylesheet" href="{{ asset('dist/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/ionicons/css/ionicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/summernote/summernote-lite.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/modules/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}">

    <style>
        :root {
            --primary-color: #592F7B;
            --secondary-color: #783F91;
            --accent-color: #BC98C4;
            --dark-color: #391F4F;
        }

        .navbar-bg {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
        }

        .main-sidebar .sidebar-brand a {
            color: var(--primary-color);
            font-weight: 700;
            font-style: italic;
        }

        .sidebar-menu li.active a {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%);
        }

        .card-icon.bg-primary {
            background: linear-gradient(135deg, var(--primary-color) 0%, var(--secondary-color) 100%) !important;
        }

        .card-icon.bg-danger {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%) !important;
        }

        .card-icon.bg-warning {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%) !important;
        }

        .card-icon.bg-success {
            background: linear-gradient(135deg, #27ae60 0%, #229954 100%) !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            @include('admin.header')
            @include('admin.sidebar')
            <div class="main-content">
                @yield('content')
            </div>
            @include('admin.footer')
        </div>
    </div>

    <script src="{{ asset('dist/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('dist/modules/popper.js') }}"></script>
    <script src="{{ asset('dist/modules/tooltip.js') }}"></script>
    <script src="{{ asset('dist/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('dist/modules/scroll-up-bar/dist/scroll-up-bar.min.js') }}"></script>
    <script src="{{ asset('dist/js/sa-functions.js') }}"></script>
    <script src="{{ asset('dist/modules/chart.min.js') }}"></script>
    <script src="{{ asset('dist/modules/summernote/summernote-lite.js') }}"></script>
    <script src="{{ asset('dist/js/scripts.js') }}"></script>
    <script src="{{ asset('dist/js/custom.js') }}"></script>
    <script src="{{ asset('dist/js/demo.js') }}"></script>
</body>

</html>