<!DOCTYPE html>
<html>

@include('shared.head')

<body class="body-font container mx-auto px-5 text-gray-600">
    <x-admin.header />

    <h1 class="pb-4 font-semibold text-gray-600">@yield('title')</h1>

    <x-flash />

    @yield('content')
</body>

</html>
