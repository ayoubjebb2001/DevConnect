<div class="p-6 dark:bg-gray-800 bg-white rounded-lg shadow-md"
x-transition:enter="transition ease-out duration-300"
x-transition:enter-start="opacity-0 scale-90"
x-transition:enter-end="opacity-100 scale-100"
x-transition:leave="transition ease-in duration-300"
x-transition:leave-start="opacity-100 scale-100"
x-transition:leave-end="opacity-0 scale-90">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Add New Skill</h2>
    
    <form wire:submit="save">
        <div class="space-y-4">
            <!-- Skill Name -->
            <div>
                <x-input-label for="name" :value="__('Skill Name')" />
                <x-text-input wire:model="name" id="name" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="flex justify-end mt-6">
                <x-secondary-button type="button" wire:click="$dispatch('closeModal')" class="mr-3">
                    Cancel
                </x-secondary-button>
                <x-primary-button type="submit">
                    Add Skill
                </x-primary-button>
            </div>
        </div>
    </form>
</div>