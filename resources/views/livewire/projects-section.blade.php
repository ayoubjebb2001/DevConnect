<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold">Projects</h3>
        @if(auth()->id() === $user->id)
            <button onclick="Livewire.dispatch('openModal', { component: 'add-project' })"
                    class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </button>
        @endif
    </div>
    @if($projects)
    <div class="space-y-4">
        @foreach($projects as $project)
            <div class="border-b border-gray-200 dark:border-gray-700 last:border-0 pb-4 last:pb-0">
                <div class="flex justify-between items-start">
                    <div>
                        <h4 class="font-medium">{{ $project->title }}</h4>
                        <p class="text-sm text-gray-500">{{ $project->description }}</p>
                        @if($project->url)
                            <a href="{{ $project->url }}" target="_blank" 
                               class="text-sm text-blue-600 hover:underline dark:text-blue-400">
                                View Project
                            </a>
                        @endif
                    </div>
                    @if(auth()->id() === $user->id)
                        <button wire:click="deleteProject({{ $project->id }})" 
                                class="text-red-600 hover:text-red-800">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                        </button>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    @endif
</div>