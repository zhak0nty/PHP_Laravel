<x-guest-layout>
    <div class="w-full max-w-lg mx-auto">
        <h1 class="text-2xl font-semibold text-gray-900 mb-6">New author</h1>

        <form method="POST" action="{{ route('authors.store') }}" class="space-y-4 bg-white p-6 rounded-md border">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Surname</label>
                <input type="text" name="surname" value="{{ old('surname') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('surname') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Birthdate</label>
                <input type="date" name="birthdate" value="{{ old('birthdate') }}" required
                       class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                @error('birthdate') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-end gap-3 pt-2">
                <a href="{{ route('authors.index') }}" class="text-sm text-gray-600 hover:underline">Cancel</a>
                <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 rounded-md text-white text-sm hover:bg-gray-700">
                    Create
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
