<div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-4">
    <div class="flex items-center justify-between mb-4">
        <h3 class="font-semibold text-gray-100  ">Skills</h3>
        @if(auth()->id() === $user->id)
            <button onclick="Livewire.dispatch('openModal', { component: 'add-skill' })"
                    class="text-blue-600 hover:text-blue-700 dark:text-blue-400 dark:hover:text-blue-300">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
            </button>
        @endif
    </div>
    <div class="flex flex-wrap gap-2">
        @foreach($skills as $skill)
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200">
                {{ $skill->name }}
                @if(auth()->id() === $user->id)
                    <button wire:click="removeSkill({{ $skill->id }})" class="ml-2 text-blue-600 hover:text-blue-800">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                @endif
            </span>
        @endforeach
    </div>
</div>