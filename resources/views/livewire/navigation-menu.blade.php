<div class="relative">
    <button wire:click="toggleNavigationDropdown" class="flex items-center space-x-3">
        <img class="h-8 w-8 rounded-full object-cover" 
             src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" 
             alt="{{ Auth::user()->name }}">
        <span class="sr-only">Open user menu</span>
    </button>

    @if($showingNavigationDropdown)
        <div class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-white dark:bg-gray-700 ring-1 ring-black ring-opacity-5">
            <div class="py-1">
                <a href="{{ route('profile.show', Auth::user()->name) }}" 
                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                    Your Profile
                </a>
                <a href="{{ route('profile.edit') }}" 
                   class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                    Settings
                </a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" 
                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                        Sign out
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>