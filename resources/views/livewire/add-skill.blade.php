<div class="p-6">
    <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100 mb-4">Add New Skill</h2>
    
    <form wire:submit="save">
        <div class="space-y-4">
            <!-- Skill Name -->
            <div>
                <x-input-label for="name" :value="__('Skill Name')" />
                <x-text-input wire:model="name" id="name" type="text" class="mt-1 block w-full" required />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <!-- Category -->
            <div>
                <x-input-label for="category" :value="__('Category')" />
                <select wire:model="category" id="category" class="mt-1 block w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
                    <option value="">Select a category</option>
                    <option value="Language">Programming Language</option>
                    <option value="Framework">Framework</option>
                    <option value="Tool">Tool</option>
                    <option value="Other">Other</option>
                </select>
                <x-input-error :messages="$errors->get('category')" class="mt-2" />
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