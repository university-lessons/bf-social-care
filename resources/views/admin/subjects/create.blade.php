@extends('layouts.admin')

@section('title')
    Cadastrar novo Sujeito
@endsection

@section('content')
    <x-admin.subject-form :action="route('admin.subjects.store')" />
@endsection
