@extends('layouts.public')

@section('content')
    <h1 class="title-font mb-4 text-3xl font-medium text-gray-900 sm:text-4xl">{{ env('APP_NAME') }}</h1>

    <p class="mb-8 leading-relaxed">Simplicidade e agilidade no registro de atendimentos sociais.</p>

    <img class="mb-10 w-5/6 rounded object-cover object-center md:w-3/6 lg:w-2/6" src="{{ asset('images/welcome.svg') }}"
        alt="Imagem de boas vindas">

    <div class="flex justify-center">

        <a class="inline-flex rounded border-0 bg-emerald-500 px-6 py-2 text-lg text-white hover:bg-emerald-600 focus:outline-none"
            href="{{ route('login') }}">Entrar</a>


        <a class="ml-4 inline-flex rounded border-0 bg-gray-100 px-6 py-2 text-lg text-gray-700 hover:bg-gray-200 focus:outline-none"
            href="#">Registre-se</a>
    </div>
@endsection
