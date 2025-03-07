<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-colors duration-200">
    <h3 class="font-semibold mb-4 text-gray-900 dark:text-gray-100">Suggested Connections</h3>
    <div class="space-y-4">
        @foreach($suggestions as $user)
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img src="{{ Auth::user()->avatar ? Storage::url(Auth::user()->avatar) : 'https://ui-avatars.com/api/?name='.urlencode(Auth::user()->name) }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full border border-gray-200 dark:border-gray-700">
                    <div>
                        <h4 class="font-medium text-gray-900 dark:text-gray-100">{{ $user->name }}</h4>
                        <p class="text-gray-500 dark:text-gray-400 text-sm">{{ $user->title }}</p>
                    </div>
                </div>
                <livewire:send-connection :user="$user" :key="$user->id" />
            </div>
        @endforeach
    </div>
</div>