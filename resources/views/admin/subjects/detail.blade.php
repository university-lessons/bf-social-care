@extends('layouts.admin')

@section('title')
    Detalhes do Sujeito
@endsection

@section('content')
    <div class="rounded bg-white p-4">
        <div class="flex flex-col justify-between sm:flex-row">
            <a class="inline-flex rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
                href="{{ route('admin.subjects.edit', ['id' => $subject['id']]) }}">Editar Sujeito</a>

            <a class="inline-flex rounded border-0 bg-red-500 px-4 py-1 text-white hover:bg-red-600 focus:outline-none"
                href="#">Excluir Sujeito</a>
        </div>

        <div class="mt-4">
            <p>
                <strong>ID:</strong> {{ $subject['id'] }}
            </p>

            <p>
                <strong>Nome:</strong> {{ $subject['name'] }}
            </p>
        </div>

        <h2 class="mt-4 font-medium text-gray-600">Atendimentos:</h2>

        <p>(sem registros)</p>
    </div>
@endsection
