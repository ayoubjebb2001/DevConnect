<div class="p-6 dark:bg-gray-800 bg-white rounded-lg shadow-md">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Add New Project</h2>
    
    <form wire:submit="save">
        <div class="space-y-4">
            <!-- Project Title -->
            <div>
                <x-input-label for="title" :value="__('Project Title')" />
                <x-text-input wire:model="title" id="title" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('title')" class="mt-2" />
            </div>

            <!-- Description -->
            <div>
                <x-input-label for="description" :value="__('Description')" />
                <textarea wire:model="description" id="description" rows="4" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"></textarea>
                <x-input-error :messages="$errors->get('description')" class="mt-2" />
            </div>

            <div class="flex justify-end mt-6">
                <x-secondary-button type="button" wire:click="$dispatch('closeModal')" class="mr-3">
                    Cancel
                </x-secondary-button>
                <x-primary-button type="submit">
                    Add Project
                </x-primary-button>
            </div>
        </div>
    </form>
</div>