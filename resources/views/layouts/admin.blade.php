<!DOCTYPE html>
<html>

@include('shared.head')

<body class="body-font bg-slate-100 text-gray-600">
    <x-admin.header />

    <section class="container mx-auto bg-slate-100 px-5 md:px-0">

        <h1 class="py-4 text-lg font-normal">@yield('title')</h1>

        <x-flash />

        @yield('content')

    </section>
</body>

</html>
