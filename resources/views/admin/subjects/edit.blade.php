@extends('layouts.admin')

@section('title')
    Atualização do Sujeito
@endsection

@section('content')
    <x-admin.subject-form :action="route('admin.subjects.update', ['subject' => $subject['id']])" :subject="$subject" />
@endsection
