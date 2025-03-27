<h1>Listagem de Sujeitos</h1>

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

<a href="{{ route('admin.subjects.create') }}">Criar Sujeito</a>

<ul>
    @foreach ($subjects as $subject)
        <li>
            <a href="{{ route('admin.subjects.detail', ['id' => $subject['id']]) }}">
                {{ $subject['name'] }}
            </a>
        </li>
    @endforeach
</ul>
