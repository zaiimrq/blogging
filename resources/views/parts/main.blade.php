<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="{{ asset('dist/css/bootstrap.min.css') }}">
    <title>Blogging Aj | {{ $title }}</title>
</head>
<body>
    @include('parts.navbar')
    @yield('container')

    <script src="{{ asset('dist/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>