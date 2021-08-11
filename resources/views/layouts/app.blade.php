<!DOCTYPE html>
<html lang="{{ App::getLocale() }}">

<head>
    <title>@lang('template.app_name') | @yield('title')</title>

    @include('includes.head')
    @yield('style')
</head>

<body>
<div class="header-2">

    @include('includes.navbar')

    <div class="py-6">
        <div class="container px-4 mx-auto">
            @include('includes.notification')
            @yield('content')
        </div>
    </div>

</div>
@include('includes.foot')
@stack('script')
</body>
</html>
