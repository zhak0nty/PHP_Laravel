<x-guest-layout>
    <div class="w-full max-w-3xl mx-auto">
        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-semibold text-gray-900">Authors</h1>
            <a href="{{ route('authors.create') }}"
               class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-white text-sm hover:bg-gray-700">
                New author
            </a>
        </div>

        @if (session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <ul class="divide-y rounded-md border bg-white">
            @forelse ($authors as $author)
                <li class="p-4 flex items-center justify-between">
                    <div>
                        <a href="{{ route('authors.show', $author) }}" class="font-medium text-gray-900 hover:underline">
                            {{ $author->fullName() }}
                        </a>
                        <p class="text-sm text-gray-500">
                            Born {{ optional($author->birthdate)->format('Y-m-d') }} ·
                            Books: {{ $author->books->count() }}
                        </p>
                    </div>
                </li>
            @empty
                <li class="p-4 text-gray-500">No authors yet.</li>
            @endforelse
        </ul>
    </div>
</x-guest-layout>
