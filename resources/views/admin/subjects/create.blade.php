@extends('layouts.admin')

@section('title')
    Criação de Sujeito
@endsection

@section('content')
    <form action="{{ route('admin.subjects.store') }}" method="POST">
        @csrf

        <label for="name">Nome</label>
        <input type="text" name="name" id="name">

        <button type="submit">Salvar</button>
    </form>
@endsection
