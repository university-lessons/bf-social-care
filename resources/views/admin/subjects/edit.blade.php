@extends('layouts.admin')

@section('title')
    Atualização do Sujeito
@endsection

@section('content')
    <form action="{{ route('admin.subjects.update', ['id' => $subject['id']]) }}" method="POST">
        @csrf

        <label for="name">Nome</label>
        <input type="text" name="name" id="name" value="{{ $subject['name'] }}">

        <button type="submit">Salvar</button>
    </form>
@endsection
