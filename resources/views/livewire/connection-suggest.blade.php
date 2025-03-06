<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <h3 class="font-semibold mb-4">Suggested Connections</h3>
    <div class="space-y-4">
        @foreach($suggestions as $user)
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <img src="{{ $user->avatarUrl }}" alt="{{ $user->name }}" class="w-10 h-10 rounded-full">
                    <div>
                        <h4 class="font-medium">{{ $user->name }}</h4>
                        <p class="text-gray-500 text-sm">{{ $user->title }}</p>
                    </div>
                </div>
                <livewire:send-connection :user="$user" :key="$user->id" />
            </div>
        @endforeach
    </div>
</div>