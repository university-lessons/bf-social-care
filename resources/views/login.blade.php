@extends('layouts.public')

@section('content')
    <div class="flex justify-center">

        <div class="flex w-[400px] flex-col rounded-lg bg-white p-8 shadow-md">

            <h2 class="title-font mb-4 text-center text-3xl font-medium text-gray-900 sm:text-4xl">
                {{ env('APP_NAME') }}
            </h2>

            <x-flash />

            <form action="{{ route('authenticate') }}" method="POST">
                @csrf

                <div class="relative mb-4">
                    <label for="email" class="text-sm leading-7 text-gray-600">Email</label>
                    <input type="email" id="email" name="email" value="{{ old('email') }}"
                        class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200" />
                    @error('email')
                        <p class="mb-4 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="relative mb-4">
                    <label for="password" class="text-sm leading-7 text-gray-600">Senha</label>
                    <input type="password" id="password" name="password"
                        class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200" />
                    @error('password')
                        <p class="mb-4 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                    class="w-full cursor-pointer rounded border-0 bg-emerald-500 px-6 py-2 text-lg text-white hover:bg-emerald-600 focus:outline-none">Entrar</button>

            </form>

        </div>

    </div>
@endsection
