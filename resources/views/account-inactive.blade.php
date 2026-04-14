<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Account inactive') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900">
                <p>{{ __('Your account status is:') }} <strong>{{ $status }}</strong></p>
                <p class="mt-4">{{ __('Only active accounts can use this area.') }}</p>
                <a href="{{ url('/') }}" class="mt-4 inline-block text-indigo-600 underline">{{ __('Return to home') }}</a>
            </div>
        </div>
    </div>
</x-app-layout>
