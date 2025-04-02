@extends('layouts.admin')

@section('title')
    Listagem de Sujeitos
@endsection

@section('content')
    <div class="flex flex-col justify-between sm:flex-row">

        <div class="flex items-center">
            <input type="text" name="search"
                class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-green-500 focus:ring-2 focus:ring-green-200"
                placeholder="Buscar" />

            <button type="submit"
                class="flex h-8 w-12 cursor-pointer items-center justify-center rounded border-0 bg-green-500 text-lg text-white hover:bg-green-600 focus:outline-none">

                <svg stroke="white" fill="white" stroke-width="0" viewBox="0 0 512 512" height="16px" width="16px"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                    </path>
                </svg>
            </button>

        </div>

        <a class="inline-flex rounded border-0 bg-green-500 px-4 py-1 text-lg text-white hover:bg-green-600 focus:outline-none"
            href="{{ route('admin.subjects.create') }}">Criar Sujeito</a>
    </div>

    <ul class="mt-4">
        @forelse ($subjects as $subject)
            <li>
                <a href="{{ route('admin.subjects.detail', ['id' => $subject['id']]) }}">
                    {{ $subject['name'] }}
                </a>
            </li>
        @empty
            <p>(sem registros)</p>
        @endforelse
    </ul>
@endsection
