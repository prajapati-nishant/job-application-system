<!-- List sort by widget -->
@if(!empty($sortableFields))
    <div class="shadow bg-white rounded-lg w-auto p-3" x-data="{}">
        <div class="flex items-center space-x-2">
            <span class="font-bold" x-ref="sortBy">Sort By: </span>
            <div class="dropdown dropdown-end">
                <div tabindex="0" class="m-1 cursor-pointer border-b border-b-4 border-black font-bold px-3">
                    {{ $sortableFields[$sortBy] }}
                </div>
                <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 rounded-box w-52" x-ref="sortDropdown"
                    style="z-index: 99999">
                    @foreach($sortableFields as $key=>$field)
                        <li class="cursor-pointer p-2 hover:bg-gray-200 capitalize @if($key==$sortBy) font-bold @endif"
                            wire:click="sortBy('{{ $key }}')" x-on:click="$($refs.sortDropdown).trigger('blur')">
                            {{ $field }}
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="font-bold cursor-pointer" wire:click="sortBy('{{ $sortBy }}')">
                @if($sortDirection=='desc')
                    <i class="fas fa-sort-amount-up fa-fw"></i>
                @else
                    <i class="fas fa-sort-amount-down-alt fa-fw"></i>
                @endif
            </div>
        </div>
    </div>
@endif
<!-- End list sort by widget -->
