<!doctype html>
<html lang="en">

<head>
    <title>@yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Iconic Bootstrap 4.5.0 Admin Template">
    <meta name="author" content="WrapTheme, design by: ThemeMakker.com">

    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendor/font-awesome/css/font-awesome.min.css') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (optional, for dismissible alerts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/main.css') }}">

</head>

<body data-theme="light" class="font-nunito">

    @yield('content')
</body>

</html>
