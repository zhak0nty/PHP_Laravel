<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                @include('articles.partials.form', [
                    'action' => route('articles.store'),
                    'method' => 'POST',
                    'article' => null,
                    'submitLabel' => __('Create'),
                ])
            </div>
        </div>
    </div>
</x-app-layout>
