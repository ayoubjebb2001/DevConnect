<div class="space-y-6 transition-colors duration-200">
    @foreach($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

    <div class="mt-4 text-gray-700 dark:text-gray-300">
        {{ $posts->links() }}
    </div>
</div>