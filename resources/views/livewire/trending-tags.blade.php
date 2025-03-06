<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-colors duration-200">
    <h3 class="font-semibold mb-4 text-gray-900 dark:text-gray-100">Trending Topics</h3>
    <div class="space-y-3">
        @foreach($trendingTags as $tag)
            <div class="flex items-center justify-between">
                <span class="text-blue-600 dark:text-blue-400 hover:underline">#{{ $tag->name }}</span>
                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $tag->posts_count }} posts</span>
            </div>
        @endforeach
    </div>
</div>