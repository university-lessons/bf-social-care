<div class="flex flex-col">
    <a href="{{ asset('storage/attachments/' . $attachment->filepath) }}" download
        class="mr-2 inline-block h-20 w-20 rounded-lg border border-gray-400 text-gray-600">
        @if (in_array(strtolower(pathinfo($attachment->filepath, PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png']))
            <img src="{{ asset('storage/attachments/' . $attachment->filepath) }}" alt="Attachment"
                class="h-full w-full object-cover">
        @else
            <div class="flex h-full w-full items-center justify-center text-center">
                Download PDF
            </div>
        @endif
    </a>

    <span class="text-sm text-slate-400">
        <form action="{{ route('admin.attachments.destroy', ['attachment' => $attachment->id]) }}" method="POST">
            @csrf
            @method('DELETE')

            <button class="mt-1 inline-flex cursor-pointer rounded border-0 px-4 py-1 text-red-500 focus:outline-none"
                type="submit">
                Excluir
            </button>
        </form>
    </span>
</div>
