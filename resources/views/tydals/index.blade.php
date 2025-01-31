<link rel="stylesheet" href="resources/css/app.css">
<x-app-layout>
    <div class="max-w-2xl mx-auto p-4 sm:p-6 lg:p-8">
        @session('success')
        {{-- <div x-data =></div> --}}


        @endsession
        <form method="POST" action="{{ route('tydal.store') }}">
            @csrf
            <textarea
                name="message"
                placeholder="{{ __('What\'s got you fired up?') }}"
                class="block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
            >{{ old('message') }}</textarea>
            <x-input-error :messages="$errors->get('message')" class="mt-2" />
            <x-primary-button class="mt-4">{{ __('Post') }}</x-primary-button>
        </form>
        <div class="mt-6 mb-4 bg-white dark:bg-gray-800 shadow-sm rounded-lg divide-y divide-gray-200 dark:divide-gray-600 custom-divider">
            @forelse ($tydal as $tyd)
                <div class="p-6 flex space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-600 -scale-x-100" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <div class="flex-1">
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="text-gray-800 dark:text-gray-100">{{ $tyd->user->name }}</span>
                                <small class="ml-2 text-sm text-gray-600 dark:text-gray-100">{{ $tyd->created_at->diffForHumans() }}</small>
                                
                                @unless ($tyd->created_at->eq($tyd->updated_at))
                                <small class="text-sm text-gray-600 dark:text-gray-100"> &middot; {{ __('edited') }}</small>
                            @endunless
                        </div>
                        @if ($tyd->user->is(auth()->user()))
                            <x-dropdown>
                                <x-slot name="trigger">
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                </x-slot>
                                <x-slot name="content">
                                    <x-dropdown-link :href="route('tydal.edit', $tyd)">
                                        {{ __('Edit') }}
                                    </x-dropdown-link>

                                    <form method="POST" action="{{ route('tydal.destroy', $tyd) }}">
                                        @csrf
                                        @method('delete')
                                        <x-dropdown-link :href="route('tydal.destroy', $tyd)" onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Delete') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        @endif
                          
                        </div>
                        <p class="mt-4 text-lg text-gray-900 dark:text-gray-100">{{ $tyd->message }}</p>
                    </div>
                </div>
            @empty
            <div class="p-6 dark:bg-gray-900">
                <p class="text-lg text-gray-800 dark:text-gray-100">No tydals found.</p>

            </div>
            @endforelse
        </div>
        {{$tydal->links()}}


</x-app-layout>



<style>
    .custom-divider > *:not(:last-child) {
        border-bottom: 1px solid var(--tw-divide-opacity, 1);
    }
</style>