@extends('layouts.admin')

@section('title')
    Detalhes do Sujeito
@endsection

@section('content')
    <a href="{{ route('admin.subjects.edit', ['id' => $subject['id']]) }}">Editar</a>

    <p>
        <strong>ID:</strong> {{ $subject['id'] }}
    </p>

    <p>
        <strong>Nome:</strong> {{ $subject['name'] }}
    </p>

    <h2>Atendimentos</h2>

    <p>(sem registros)</p>
@endsection
