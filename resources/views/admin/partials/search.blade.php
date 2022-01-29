<div class="flex w-full max-w-sm space-x-2 float-right">
    <div class="relative">
        <input type="text"
               class="rounded-lg border-transparent flex-1 appearance-none border border-gray-300 w-full py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-secondary focus:border-transparent"
               wire:model.defer="searchQuery" wire:keydown.enter="doSearch" placeholder="Search here..."
               name="searchQuery"/>
    </div>
    <button type="button"
            class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-primary rounded-lg shadow-md hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-secondary"
            wire:click="doSearch">
        {{ __('Search') }}
    </button>
    <button type="button"
            class="flex-shrink-0 px-4 py-2 text-base font-semibold text-white bg-primary rounded-lg shadow-md hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-secondary @if($searchQuery == "") btn-disabled @endif"
            wire:click="$set('searchQuery', '')">
        {{ __('Reset') }}
    </button>
</div>
