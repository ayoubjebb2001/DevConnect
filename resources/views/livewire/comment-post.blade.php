<div>
    <div class="space-y-4">
        @foreach($post->comments as $comment)
            <div class="flex space-x-3">
                <img class="h-8 w-8 rounded-full" src="{{ $comment->user->avatar ? Storage::url($comment->user->avatar) : 'https://ui-avatars.com/api/?name='.urlencode($comment->user->name) }}"" alt="{{ $comment->user->name }}">
                <div class="flex-1">
                    <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-3">
                        <div class="font-medium">{{ $comment->user->name }}</div>
                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $comment->content }}</p>
                    </div>
                    <div class="text-xs text-gray-500 mt-1">{{ $comment->created_at->diffForHumans() }}</div>
                </div>
            </div>
        @endforeach
    </div>

    <form wire:submit="addComment" class="mt-4">
        <textarea 
            wire:model="content" 
            class="w-full rounded-lg border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300"
            rows="2"
            placeholder="Write a comment..."></textarea>
        <div class="mt-2 flex justify-end">
            <x-primary-button type="submit">Comment</x-primary-button>
        </div>
    </form>
</div> 