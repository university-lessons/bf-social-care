@extends('layouts.admin')

@section('title')
    Listagem de Sujeitos
@endsection

@section('content')
    <a href="{{ route('admin.subjects.create') }}">Criar Sujeito</a>

    <ul>
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
