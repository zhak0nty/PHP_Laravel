<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ $article->title }}
            </h2>
            <div class="flex gap-4">
                @can('update', $article)
                    <a href="{{ route('articles.edit', $article) }}" class="text-sm text-indigo-600 underline">{{ __('Edit') }}</a>
                @endcan
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="p-4 rounded-md bg-green-50 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @if (auth()->user()->isModerator())
                    <p class="text-sm text-gray-500 mb-4">
                        {{ __('Author') }}: {{ $article->user->name }} &lt;{{ $article->user->email }}&gt;
                    </p>
                @endif
                <div class="prose max-w-none text-gray-800 whitespace-pre-wrap">{{ $article->body }}</div>
            </div>

            <div class="flex gap-4">
                <a href="{{ route('articles.index') }}" class="text-sm text-gray-600 underline">{{ __('Back to list') }}</a>
                @can('delete', $article)
                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('{{ __('Delete this article?') }}');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 underline">{{ __('Delete') }}</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>
</x-app-layout>
