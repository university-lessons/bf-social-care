@if (session('success'))
    <div class="mb-4 flex h-full items-center rounded bg-green-300 p-4">
        {{ session('success') }}
    </div>
@endif


@if (session('error'))
    <div class="mb-4 flex h-full items-center rounded bg-red-300 p-4">
        {{ session('error') }}
    </div>
@endif
