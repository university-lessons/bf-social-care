<header class="w-lvw bg-white px-4">
    <div class="container mx-auto flex flex-row items-center justify-between py-5">
        <a class="title-font flex items-center font-medium text-gray-900" href="{{ route('admin.subjects.index') }}">
            <img class="mr-2 h-10 w-10 rounded-full" src="{{ asset('images/logo.png') }}" alt="Logo">
            <span class="ml-3 text-xl">{{ env('APP_NAME') }}</span>
        </a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit"
                class="inline-flex cursor-pointer items-center rounded border-0 bg-gray-100 px-3 py-1 hover:bg-gray-200 focus:outline-none"
                href="{{ route('welcome') }}">
                Sair
            </button>
        </form>
    </div>
</header>
