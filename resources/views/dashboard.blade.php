<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profile
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Profile Header -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow mb-6">
                <div class="p-6">
                    <div class="flex flex-col md:flex-row items-start md:items-center gap-6">
                        <!-- Avatar -->
                        <div class="flex-shrink-0">
                            <img class="h-32 w-32 rounded-full object-cover"
                                src="{{'https://ui-avatars.com/api/?name='.urlencode($user->name) }}"
                                alt="{{ $user->name }}">
                        </div>

                        <!-- User Info -->
                        <div class="flex-grow">
                            <div class="flex items-center justify-between">
                                <div>
                                    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $user->name }}
                                    </h1>
                                    <p class="text-gray-600 dark:text-gray-400">{{ $user->title }}</p>
                                </div>

                                <!-- Follow/Edit Button -->
                                @if(Auth::id() === $user->id)
                                <a href="{{ route('profile.edit') }}"
                                    class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                    Edit Profile
                                </a>
                                @else
                                <button
                                    class="inline-flex items-center px-4 py-2 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Follow
                                </button>
                                @endif
                            </div>

                            <!-- Bio & Details -->
                            <div class="mt-4 space-y-4">
                                @if($user->bio)
                                <p class="text-gray-600 dark:text-gray-400">{{ $user->bio }}</p>
                                @endif

                                <div class="flex flex-wrap gap-4 text-sm text-gray-600 dark:text-gray-400">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                        </svg>
                                        Joined {{ $user->created_at->diffForHumans() }}
                                    </div>

                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                        </svg>
                                        {{ $user->email }}
                                    </div>

                                    @if($user->github_url)
                                    <a href="{{ $user->github_url }}" target="_blank"
                                        class="flex items-center hover:text-gray-900 dark:hover:text-gray-100">
                                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z" />
                                        </svg>
                                        {{ basename($user->github_url) }}
                                    </a>
                                    @endif

                                    @if($user->portfolio_url)
                                    <a href="{{ $user->portfolio_url }}" target="_blank"
                                        class="flex items-center hover:text-gray-900 dark:hover:text-gray-100">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9" />
                                        </svg>
                                        Portfolio
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Two Column Layout -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Left Sidebar -->
                <div class="space-y-6">
                    <!-- Skills Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Skills</h2>
                                @if(Auth::id() === $user->id)
                                <button wire:click="$dispatch('showModal', { component: 'add-skill' })"
                                    class="inline-flex items-center px-3 py-1 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Add Skill
                                </button>
                                @endif
                            </div>
                            <div class="flex flex-wrap gap-2">
                                @forelse($user->skills as $skill)
                                <span
                                    class="px-3 py-1 text-sm bg-gray-100 dark:bg-gray-700 rounded-full text-gray-700 dark:text-gray-300">
                                    {{ $skill->name }}
                                </span>
                                @empty
                                <p class="text-gray-500 dark:text-gray-400">No skills added yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Projects Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Projects</h2>
                            @if($user->projects)
                            <div class="space-y-4">
                                @foreach(json_decode($user->projects) as $project)
                                <div class="border-b border-gray-200 dark:border-gray-700 pb-4 last:border-0 last:pb-0">
                                    <h3 class="font-medium text-gray-900 dark:text-gray-100">{{ $project->name }}</h3>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">{{ $project->description }}</p>
                                </div>
                                @endforeach
                            </div>
                            @else
                            <p class="text-gray-500 dark:text-gray-400">No projects added yet</p>
                            @endif
                        </div>
                    </div>

                    <!-- Stats Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Stats</h2>
                            <div class="grid grid-cols-3 gap-4 text-center">
                                <div>
                                    <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">
                                        {{$user->posts->count() }} </span>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Posts</span>
                                </div>
                                <div>
                                    <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">0</span>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Connections</span>
                                </div>
                                <div>
                                    <span class="block text-2xl font-bold text-gray-900 dark:text-gray-100">0</span>
                                    <span class="text-sm text-gray-600 dark:text-gray-400">Comments</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Latest Posts -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6">
                            <div class="flex justify-between items-center mb-6">
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">Latest Posts</h2>
                                @if(Auth::id() === $user->id)
                                <button wire:navigate href="{{ route('post.create') }}"
                                    class="inline-flex items-center px-3 py-1 bg-blue-600 dark:bg-blue-500 border border-transparent rounded-md text-xs text-white uppercase tracking-widest hover:bg-blue-700 dark:hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Create Post
                                </button>
                                @endif
                            </div>

                            <div class="space-y-6">
                                @forelse ($user->posts as $post)
                                <x-post-card :post="$post" />
                                @empty
                                <p class="text-gray-500 dark:text-gray-400">No posts yet</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Latest Comments -->
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow">
                        <div class="p-6">
                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Latest Comments</h2>
                            <p class="text-gray-500 dark:text-gray-400">No comments yet</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>