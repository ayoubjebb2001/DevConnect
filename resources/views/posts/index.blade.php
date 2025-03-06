<x-app-layout>
    <div class="max-w-7xl mx-auto pt-20 px-4 bg-gray-100 dark:bg-gray-900 min-h-screen transition-colors duration-200">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <!-- Left Sidebar -->
            <div class="space-y-6">
                <livewire:profile-stats />
                <livewire:trending-tags />
            </div>

            <!-- Main Feed -->
            <div class="lg:col-span-2 space-y-6">
                <livewire:posts-feed />
            </div>

            <!-- Right Sidebar -->
            <div class="space-y-6">
                <livewire:connection-suggest />
            </div>
        </div>
    </div>
</x-app-layout>