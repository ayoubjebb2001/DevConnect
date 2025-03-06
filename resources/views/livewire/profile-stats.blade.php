<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4 transition-colors duration-200">
    <h3 class="font-semibold mb-4 text-gray-900 dark:text-gray-100">Profile Stats</h3>
    <div class="grid grid-cols-2 gap-4">
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-200">
            <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['posts'] }}</span>
            <span class="text-gray-500 dark:text-gray-400 text-sm">Posts</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-200">
            <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['connections'] }}</span>
            <span class="text-gray-500 dark:text-gray-400 text-sm">Connections</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-200">
            <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['skills'] }}</span>
            <span class="text-gray-500 dark:text-gray-400 text-sm">Skills</span>
        </div>
        <div class="text-center p-3 bg-gray-50 dark:bg-gray-700 rounded-lg transition-colors duration-200">
            <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $stats['projects'] }}</span>
            <span class="text-gray-500 dark:text-gray-400 text-sm">Projects</span>
        </div>
    </div>
</div>