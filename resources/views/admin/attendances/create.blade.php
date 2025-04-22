@extends('layouts.admin')

@section('title')
    Cadastrar novo Atendimento
@endsection

@section('content')
    <form action="{{ route('admin.attendances.store', ['subject' => $subject->id]) }}" method="POST">
        @csrf

        <label for="description">Descrição</label>
        <textarea
            class="w-full rounded border border-gray-300 bg-white text-base leading-8 text-gray-700 outline-none transition-colors duration-200 ease-in-out focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200"
            name="description" id="description">{{ old('description', $subject['description'] ?? '') }}</textarea>
        @error('description')
            <p class="mb-4 text-sm text-red-500">{{ $message }}</p>
        @enderror

        <div class="mt-4 flex flex-col">
            <label for="description">Origem</label>
            <div class="mt-2">
                <div class="mb-2 flex items-center">
                    <input id="origin-internal" type="radio" name="origin" value="internal"
                        {{ old('origin', $subject['origin'] ?? 'internal') == 'internal' ? 'checked' : '' }}>
                    <label for="origin-internal" class="ml-2 block text-sm font-medium text-gray-700">Interna</label>
                </div>
                <div class="flex items-center">
                    <input id="origin-external" type="radio" name="origin" value="external"
                        {{ old('origin', $subject['origin'] ?? 'internal') == 'external' ? 'checked' : '' }}>
                    <label for="origin-external" class="ml-2 block text-sm font-medium text-gray-700">Externa</label>
                </div>
            </div>
            @error('origin')
                <div class="mt-2 text-sm text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4 flex flex-col">
            <label for="demands">Demandas</label>
            <div class="mt-2">
                @foreach (\App\Models\Demand::all() as $demand)
                    <div class="mb-2 flex items-center">
                        <input id="demand-{{ $demand->id }}" type="checkbox" name="demands[]" value="{{ $demand->id }}">
                        <label for="demand-{{ $demand->id }}"
                            class="ml-2 block text-sm font-medium text-gray-700">{{ $demand->description }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        <button
            class="mt-4 inline-flex cursor-pointer rounded border-0 bg-emerald-500 px-4 py-1 text-white hover:bg-emerald-600 focus:outline-none"
            type="submit">
            Cadastrar
        </button>
    </form>
@endsection
