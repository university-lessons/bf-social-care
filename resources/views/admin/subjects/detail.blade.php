<h1>Detalhes do Sujeito</h1>

<a href="{{ route('admin.subjects.edit', ['id' => $subject['id']]) }}">Editar</a>

<p>
    <strong>ID:</strong> {{ $subject['id'] }}
</p>

<p>
    <strong>Nome:</strong> {{ $subject['name'] }}
</p>

<h2>Atendimentos</h2>

<p>(sem registros)</p>
