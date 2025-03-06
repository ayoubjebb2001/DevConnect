<div class="space-y-6">
    @foreach($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

    <div class="mt-4">
        {{ $posts->links() }}
    </div>
</div>