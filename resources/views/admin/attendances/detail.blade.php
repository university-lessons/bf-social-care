@extends('layouts.admin')

@section('title')
    Detalhes do Atendimento
@endsection

@section('content')
    <div class="rounded bg-white p-4">
        <p><strong>Sujeito:</strong> {{ $attendance->subject->name }}</p>

        <p class="mt-4"><strong>Data do atendimento:</strong> {{ $attendance->created_at->format('d/m/Y') }}</p>

        <p class="mt-4"><strong>Responsável pelo atendimento:</strong> {{ $attendance->user->name }}</p>

        <p class="mt-4"><strong>Descrição do atendimento:</strong></p>

        <p class="mt-2 rounded bg-slate-50 p-4">{{ $attendance->description }}</p>

        <p class="mt-4"><strong>Demandas:</strong></p>

        <div class="mt-2 flex flex-col rounded bg-slate-50 p-4">
            @forelse ($attendance->demands as $demand)
                <p class="mb-2">{{ $demand->description }}</p>
            @empty
                <p>(sem demandas)</p>
            @endforelse
        </div>

        <hr class="my-8 text-slate-200" />

        <p class="mt-4"><strong>Encaminhamentos:</strong></p>

        @if ($attendance->forwarding)
            <span class="text-sm text-slate-400">
                Registrados por {{ $attendance->forwarding->user->name }} em
                {{ $attendance->forwarding->created_at->format('d/m/Y') }}
            </span>
        @endif

        <form action="{{ route('admin.attendances.setforwarding', ['attendance' => $attendance->id]) }}" method="POST">
            @csrf

            <label for="description">Descrição</label>
            <div class="mt-2 flex flex-row">

                <textarea
                    class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
                    name="description" id="description">{{ old('description', $attendance->forwarding['description'] ?? '') }}</textarea>
                @error('description')
                    <p class="mb-4 text-sm text-red-500">{{ $message }}</p>
                @enderror

                <button
                    class="inline-flex cursor-pointer rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
                    type="submit">
                    Registrar encaminhamentos
                </button>
            </div>
        </form>

        <hr class="my-8 text-slate-200" />

        <p class="mt-4"><strong>Anexos:</strong></p>

        <div class="my-2 flex flex-wrap">
            @foreach ($attendance->attachments as $attachment)
                <x-admin.attachment :attachment="$attachment" />
            @endforeach
        </div>

        <form method="POST" action="{{ route('admin.attendances.storeAttachment', ['attendance' => $attendance->id]) }}"
            enctype="multipart/form-data">
            <div class="flex flex-row">
                @csrf
                <div>
                    <label for="file"
                        class="flex items-center rounded-md border border-gray-300 bg-white px-4 py-2 shadow-sm focus-within:ring-2 focus-within:ring-emerald-500 focus-within:ring-offset-2 hover:bg-gray-50">
                        <input type="file" name="file" id="file" accept=".jpg, .jpeg, .png, .pdf"
                            class="block w-full text-sm text-gray-500 file:mr-4 file:rounded-full file:border-0 file:bg-blue-50 file:px-4 file:py-2 file:text-sm file:font-semibold file:text-blue-700 hover:file:bg-blue-100">
                    </label>
                    @error('file')
                        <p class="mb-4 text-sm text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button
                    class="inline-flex cursor-pointer items-center rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
                    type="submit">Enviar Anexo</button>
            </div>
        </form>

        <hr class="my-8 text-slate-200" />

        <h2 class="mt-6 font-medium text-red-600">Área de atenção:</h2>

        <form action="{{ route('admin.attendances.destroy', ['attendance' => $attendance->id]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button
                class="mt-2 inline-flex cursor-pointer rounded border-0 bg-red-500 px-4 py-1 text-white hover:bg-red-600 focus:outline-none"
                type="submit">
                Excluir Atendimento
            </button>
        </form>
    </div>
@endsection
