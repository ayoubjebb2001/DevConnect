<div class="space-y-6 transition-colors duration-200">
    @foreach($posts as $post)
        <x-post-card :post="$post" />
    @endforeach

</div>