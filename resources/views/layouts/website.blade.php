<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    {{-- meta tags --}}
    @include('vendor.head.meta-tags')
    {{-- every link tag including: fonts, css-plugins, favicon, styles and etc. --}}
    @include('vendor.head.link-tags')
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/css/mystyle.css') }}" />
    <title>Miru</title>
    <!-- favicon -->
    <link rel="icon" href="{{ URL::asset('favicon.ico') }}" type="image/x-icon"/>
</head>
<body>
    {{-- class injections from App\Classes folder --}}
    @inject('cart', 'App\Classes\Cart')

    @include('vendor.header')
    @include('vendor.header-mobile')
    {{-- cart and mobile menu --}}
    @include('vendor.offcanvas')
    
    @yield('content')

    @include('vendor.footer')
    
    {{-- javascript source scripts --}}
    @include('vendor.js-dependencies')
    {{-- Optional for pages: page's javascript part --}}
    @yield('javascript')
    @yield('vue')

</body>
</html>