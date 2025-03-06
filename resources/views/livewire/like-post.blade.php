
<div class="flex items-center space-x-2">
    <button wire:click="toggleLike" class="flex items-center space-x-2 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
        <svg class="w-5 h-5 {{ $isLiked ? 'text-blue-600 fill-current' : '' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        <span>{{ $likesCount }} {{ Str::plural('Like', $likesCount) }}</span>
    </button>
</div>