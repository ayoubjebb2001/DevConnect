<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Profile
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Profile Section -->
                <div class="lg:col-span-1 space-y-6">
                    <livewire:profile-card :user="$user" />
                    <livewire:skills-section :user="$user" />
                    <livewire:projects-section :user="$user" />
                </div>

                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <livewire:user-posts :user="$user" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>