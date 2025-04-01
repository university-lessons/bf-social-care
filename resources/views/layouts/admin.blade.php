<!DOCTYPE html>
<html>

@include('shared.head')

<body>
    <h1>@yield('title')</h1>

    <x-flash />

    @yield('content')
</body>

</html>
