@props(['post'])
<div
    class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
    <div class="p-6">
        <!-- Post Header -->
        <div class="flex items-center space-x-3 mb-4">
            <img class="h-10 w-10 rounded-full object-cover"
                src="{{ 'https://ui-avatars.com/api/?name='.urlencode($post->user->name) }}"
                alt="{{ $post->user->name }}">
            <div>
                <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $post->user->name }}</h3>
                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <!-- Post Content -->
        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">
                {{ $post->title }}
            </h2>

            <div class="text-gray-800 dark:text-gray-50">
                {!! $post->content !!}
            </div>

            @if($post->image)
            <img src="{{ Storage::url($post->image) }}" alt="Post image"
                class="rounded-lg w-full object-cover max-h-96">
            @endif

            @if($post->hashtags)
            <div class="flex flex-wrap gap-2">
                @foreach(explode(',', $post->hashtags) as $tag)
                <span class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                    #{{ $tag }}
                </span>
                @endforeach
            </div>
            @endif

            @if($post->links)
            <div class="flex items-center space-x-2 text-sm text-blue-600 dark:text-blue-400">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <a href="{{ $post->links }}" target="_blank" class="hover:underline">
                    {{ $post->links }}
                </a>
            </div>
            @endif
        </div>

        <!-- Post Actions -->
        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex space-x-4">
                <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    <span class="text-sm">0 Likes</span>
                </button>

                <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                    <span class="text-sm">Comment</span>
                </button>

                <button class="flex items-center space-x-2 text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z" />
                    </svg>
                    <span class="text-sm">Share</span>
                </button>
            </div>

            @if(Auth::id() === $post->user_id)
            <div class="flex items-center space-x-2">
                <button class="text-gray-500 hover:text-blue-600 dark:hover:text-blue-400">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </button>
                <button class="text-gray-500 hover:text-red-600">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                </button>
            </div>
            @endif
        </div>
    </div>
</div>