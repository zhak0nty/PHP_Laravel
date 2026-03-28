@php
    /** @var \App\Models\Article|null $article */
@endphp
<form method="POST" action="{{ $action }}" class="space-y-6">
    @csrf
    @if (strtoupper($method) !== 'POST')
        @method($method)
    @endif

    <div>
        <x-input-label for="title" :value="__('Title')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title', $article?->title)" required autofocus />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="body" :value="__('Body')" />
        <textarea id="body" name="body" rows="10" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('body', $article?->body) }}</textarea>
        <x-input-error :messages="$errors->get('body')" class="mt-2" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ $submitLabel }}</x-primary-button>
        <a href="{{ $article ? route('articles.show', $article) : route('articles.index') }}" class="text-sm text-gray-600 underline">{{ __('Cancel') }}</a>
    </div>
</form>
