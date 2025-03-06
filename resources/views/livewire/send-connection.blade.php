<div>
    @if($isConnected)
        <span class="text-sm text-gray-500">Connected</span>
    @elseif($isPending)
        <span class="text-sm text-gray-500">Request Pending</span>
    @else
        <button wire:click="sendRequest" class="text-blue-500 hover:text-blue-600">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
            </svg>
        </button>
    @endif
</div>