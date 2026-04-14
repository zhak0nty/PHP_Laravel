<x-guest-layout>
    <div class="text-center space-y-4">
        <h1 class="text-2xl font-semibold text-gray-900">{{ config('app.name', 'Laravel') }}</h1>
        <p class="text-gray-600">{{ __('User & Article management demo') }}</p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-4">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">
                {{ __('Log in') }}
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-50">
                {{ __('Register') }}
            </a>
        </div>
    </div>
</x-guest-layout>
