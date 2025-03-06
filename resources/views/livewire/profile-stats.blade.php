<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <h3 class="font-semibold mb-4">Profile Stats</h3>
    <div class="grid grid-cols-2 gap-4">
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <span class="block text-2xl font-bold">{{ $stats['posts'] }}</span>
            <span class="text-gray-500 text-sm">Posts</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <span class="block text-2xl font-bold">{{ $stats['connections'] }}</span>
            <span class="text-gray-500 text-sm">Connections</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <span class="block text-2xl font-bold">{{ $stats['skills'] }}</span>
            <span class="text-gray-500 text-sm">Skills</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
            <span class="block text-2xl font-bold">{{ $stats['projects'] }}</span>
            <span class="text-gray-500 text-sm">Projects</span>
        </div>
    </div>
</div>