<h1>Criação de Sujeito</h1>

@if (session('success'))
    <div style="color: green">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div style="color: red">
        {{ session('error') }}
    </div>
@endif

<form action="{{ route('admin.subjects.store') }}" method="POST">
    @csrf

    <label for="name">Nome</label>
    <input type="text" name="name" id="name">

    <button type="submit">Salvar</button>
</form>
