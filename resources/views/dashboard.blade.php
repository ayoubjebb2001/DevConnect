<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Feed Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Sidebar -->
                <div class="lg:col-span-1">
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6">
                        <div class="flex items-center space-x-4">
                            <img class="h-16 w-16 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</h2>
                                <p class="text-gray-600 dark:text-gray-400">Full Stack Developer</p>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200">Your Stats</h3>
                            <div class="mt-2 grid grid-cols-2 gap-4">
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-gray-800 dark:text-gray-200">0</span>
                                    <span class="text-gray-600 dark:text-gray-400">Posts</span>
                                </div>
                                <div class="text-center">
                                    <span class="block text-2xl font-bold text-gray-800 dark:text-gray-200">0</span>
                                    <span class="text-gray-600 dark:text-gray-400">Connections</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2">
                    <!-- Create Post Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-6">
                        <div class="p-4 border-b border-gray-200 dark:border-gray-700">
                            <div class="flex items-center space-x-4">
                                <img class="h-10 w-10 rounded-full" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="{{ Auth::user()->name }}">
                                <a href="" class="w-full text-left px-4 py-2 bg-gray-100 dark:bg-gray-700 rounded-lg text-gray-600 dark:text-gray-400">
                                    What's on your mind?
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Feed -->
                    <div class="space-y-6">
                        <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                            <div class="p-6">
                                <p class="text-gray-600 dark:text-gray-400">No posts yet. Create your first post!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>