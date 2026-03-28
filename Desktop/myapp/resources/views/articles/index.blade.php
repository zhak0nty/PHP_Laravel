<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Articles') }}
            </h2>
            @can('create', App\Models\Article::class)
                <a href="{{ route('articles.create') }}"
                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                    {{ __('New article') }}
                </a>
            @endcan
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-4">
            @if (session('status'))
                <div class="p-4 rounded-md bg-green-50 text-green-800 text-sm">
                    {{ session('status') }}
                </div>
            @endif

            @if (auth()->user()->isModerator())
                <p class="text-sm text-gray-600">{{ __('As a moderator you see all articles.') }}</p>
            @else
                <p class="text-sm text-gray-600">{{ __('Your articles:') }}</p>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <ul class="divide-y divide-gray-200">
                    @forelse ($articles as $article)
                        <li class="p-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                            <div>
                                <a href="{{ route('articles.show', $article) }}" class="text-lg font-medium text-indigo-600 hover:text-indigo-800">
                                    {{ $article->title }}
                                </a>
                                @if (auth()->user()->isModerator() && $article->user)
                                    <p class="text-sm text-gray-500 mt-1">{{ __('Author') }}: {{ $article->user->name }} ({{ $article->user->email }})</p>
                                @endif
                                <p class="text-xs text-gray-400 mt-1">{{ $article->updated_at->diffForHumans() }}</p>
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @can('update', $article)
                                    <a href="{{ route('articles.edit', $article) }}" class="text-sm text-gray-700 underline">{{ __('Edit') }}</a>
                                @endcan
                                @can('delete', $article)
                                    <form action="{{ route('articles.destroy', $article) }}" method="POST" onsubmit="return confirm('{{ __('Delete this article?') }}');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-sm text-red-600 underline">{{ __('Delete') }}</button>
                                    </form>
                                @endcan
                            </div>
                        </li>
                    @empty
                        <li class="p-6 text-gray-500">{{ __('No articles yet.') }}</li>
                    @endforelse
                </ul>
            </div>

            <div>
                {{ $articles->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
