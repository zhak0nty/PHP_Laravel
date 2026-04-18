<x-guest-layout>
    <div class="w-full max-w-3xl mx-auto">
        @if (session('status'))
            <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">{{ session('status') }}</div>
        @endif

        <div class="bg-white p-6 rounded-md border">
            <h1 class="text-2xl font-semibold text-gray-900">{{ $author->fullName() }}</h1>
            <p class="text-gray-500 mt-1">Born: {{ optional($author->birthdate)->format('Y-m-d') }}</p>

            <h2 class="text-lg font-semibold text-gray-900 mt-6 mb-2">Books</h2>
            <ul class="list-disc pl-5 space-y-1">
                @forelse ($author->books as $book)
                    <li>
                        <span class="font-medium">{{ $book->short_title }}</span>
                        <span class="text-gray-500">({{ $book->year }}) — {{ $book->title }}</span>
                    </li>
                @empty
                    <li class="list-none text-gray-500">No books.</li>
                @endforelse
            </ul>

            <div class="mt-6">
                <a href="{{ route('authors.index') }}" class="text-sm text-gray-600 hover:underline">← Back to list</a>
            </div>
        </div>
    </div>
</x-guest-layout>
