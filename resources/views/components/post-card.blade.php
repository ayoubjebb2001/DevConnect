@props(['post'])
<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 overflow-hidden">
    <div class="p-6">
        <div class="flex items-center space-x-3 mb-4">
            <img class="h-10 w-10 rounded-full object-cover"
                src="{{ $post->user->avatarUrl }}"
                alt="{{ $post->user->name }}">
            <div>
                <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $post->user->name }}</h3>
                <p class="text-xs text-gray-500">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        <div class="space-y-4">
            <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">{{ $post->title }}</h2>
            <div class="prose dark:prose-invert max-w-none">
                {!! $post->content !!}
            </div>

            @if($post->image)
                <img src="{{ Storage::url($post->image) }}" alt="Post image" class="rounded-lg w-full object-cover max-h-96">
            @endif

            <div class="flex flex-wrap gap-2">
                @foreach($post->hashtags as $tag)
                    <span class="text-sm text-blue-600 dark:text-blue-400 hover:underline">
                        #{{ $tag->name }}
                    </span>
                @endforeach
            </div>

            @if($post->links)
                <div class="flex items-center space-x-2 text-sm text-blue-600 dark:text-blue-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                    <a href="{{ $post->links }}" target="_blank" class="hover:underline">{{ $post->links }}</a>
                </div>
            @endif
        </div>

        <div class="flex items-center justify-between mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
            <div class="flex space-x-4">
                <livewire:like-post :post="$post" :key="'like-'.$post->id" />
            </div>
        </div>
        <livewire:comment-post :post="$post" :key="'comment-'.$post->id" />
    </div>
</div>