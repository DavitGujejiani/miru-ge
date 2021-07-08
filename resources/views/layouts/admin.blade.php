<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Miru.ge Admin Panel</title>
    <link rel="stylesheet" href="{{ asset('css/admin/style.css') }}">
    @include('vendor.head.link-tags')
</head>
<body>
        @include('admin.vendor.header')
    @include('admin.vendor.sidebar')

    <div id="content-wrapper">
        @yield('content')
    </div>
    @yield('javascript')
</body>
</html>