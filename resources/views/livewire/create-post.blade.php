<div>
    <form wire:submit="save" class="space-y-6" enctype="multipart/form-data">
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input wire:model.blur="title" id="title" type="text" class="mt-1 block w-full" required />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            <div wire:ignore>
                <div id="editor" class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300" style="height: 300px;">
                    {!! $content !!}
                </div>
            </div>
            <x-text-input type="hidden" wire:model="content" id="content"/>
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="hashtags" :value="__('Hashtags')" />
            <x-text-input wire:model="hashtags" id="hashtags" type="text" class="mt-1 block w-full" placeholder="#laravel #php" />
            <x-input-error :messages="$errors->get('hashtags')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="links" :value="__('Links')" />
            <x-text-input wire:model="links" id="links" type="text" class="mt-1 block w-full" />
            <x-input-error :messages="$errors->get('links')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="image" :value="__('Image')" />
            <input type="file" wire:model="image" id="image" class="mt-1 block w-full" accept="image/*">
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <div class="flex justify-end gap-x-4">
            <x-secondary-button type="button" wire:click="$dispatch('closeModal')">
                Cancel
            </x-secondary-button>
            <x-primary-button type="submit">
                Create Post
            </x-primary-button>
        </div>
    </form>

    @push('scripts')
    <script>
        document.addEventListener('livewire:navigated', function () {
            const quill = new Quill('#editor', {
                theme: 'snow',
                modules: {
                    toolbar: [
                        [{ 'header': [1, 2, 3, false] }],
                        ['bold', 'italic', 'underline'],
                        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                        ['link', 'image', 'code-block'],
                        ['clean']
                    ]
                },
                placeholder: 'Write your post content here...',
            });

            // Sync Quill content with Livewire
            quill.on('text-change', function() {
                let content = document.querySelector('#editor').querySelector('.ql-editor').innerHTML;
                @this.set('content', content);
            });

            // Handle Livewire updates
            Livewire.on('contentUpdated', function(content) {
                quill.root.innerHTML = content;
            });
        });
    </script>
    @endpush
</div>
