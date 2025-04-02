@extends('layouts.admin')

@section('title')
    Criação de Sujeito
@endsection

@section('content')
    <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf

        <label for="name">Nome</label>
        <input
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-green-500 focus:ring-2 focus:ring-green-200"
            type="text" name="name" id="name">

        <button
            class="inline-flex rounded border-0 bg-green-500 px-4 py-1 text-lg text-white hover:bg-green-600 focus:outline-none"
            type="submit">Salvar</button>
    </form>
@endsection
