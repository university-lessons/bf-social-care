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
            <p><strong>Nome:</strong> {{ $subject->name }}</p>
            <p><strong>Pessoa Próxima:</strong> {{ $subject->close_relative }}</p>
            <p><strong>Grau de Parentesco:</strong>
                {{ App\Helpers\SubjectHelper::getCloseRelativeDegree($subject->close_relative_degree) }}
            </p>
            <p><strong>Data de Nascimento:</strong> {{ $subject->birthdate }}</p>
            <p><strong>CPF:</strong> {{ $subject->cpf }}</p>
            <p><strong>RG:</strong> {{ $subject->rg }}</p>
            <p><strong>Local de Nascimento:</strong> {{ $subject->birthplace }}</p>
            <p><strong>Endereço:</strong> {{ $subject->address }}</p>
            <p><strong>Religião:</strong> {{ $subject->religion }}</p>
            <p><strong>Cor:</strong>
                {{ App\Helpers\SubjectHelper::getSubjectColor($subject->color) }}
            </p>
            <p><strong>Renda:</strong>
                {{ App\Helpers\SubjectHelper::getSubjectIncome($subject->income) }}
            </p>
            <p><strong>Dependência Química:</strong> {{ $subject->chemical_dependency }}</p>
            <p><strong>Artigo do Crime:</strong> {{ $subject->crime_article }}</p>
            <p><strong>Status do Crime:</strong> {{ $subject->crime_status }}</p>
            <p><strong>Telefone da Família:</strong> {{ $subject->family_telephone }}</p>
            <p><strong>Endereço da Família:</strong> {{ $subject->family_address }}</p>
        </div>

        <h2 class="mt-4 font-medium text-gray-600">Atendimentos:</h2>

        <div class="mt-4 flex flex-col">
            @forelse ($subject->attendances as $attendance)
                <a
                    href="{{ route('admin.attendances.detail', ['id' => $subject->id, 'attendanceId' => $attendance->id]) }}">
                    {{ $attendance->created_at->format('d/m/Y') }}, por {{ $attendance->user->name }}
                </a>
            @empty
                <p>(sem registros)</p>
            @endforelse
        </div>

        <a class="mt-4 inline-flex rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
            href="{{ route('admin.attendances.create', ['id' => $subject->id]) }}">Novo Atendimento
        </a>
    </div>
@endsection
