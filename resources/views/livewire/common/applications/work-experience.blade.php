<div>
    <h3 class="text-2xl font-semibold text-center">Work Experience</h3>
    @foreach($experiences as $key=>$experience)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Company</span>
                    </label>
                    <input type="text" wire:model="experiences.{{ $key }}.company" placeholder="Company Name"
                           class="input input-bordered">
                    @error('experiences.'.$key.'.company')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">Designation</span>
                    </label>
                    <input type="text" wire:model="experiences.{{ $key }}.designation" placeholder="Designation"
                           class="input input-bordered">
                    @error('experiences.'.$key.'.designation')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">From</span>
                    </label>
                    <input type="date" wire:model="experiences.{{ $key }}.from" placeholder="From Date"
                           class="input input-bordered">
                    @error('experiences.'.$key.'.from')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-control">
                    <label class="label">
                        <span class="label-text">To</span>
                    </label>
                   <input type="date" wire:model="experiences.{{ $key }}.to" placeholder="To Date"
                           class="input input-bordered">
                    @error('experiences.'.$key.'.to')
                    <div class="text-red-500 text-sm">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="flex w-full justify-end mt-2">
                <button wire:click="remove({{ $key }})" class="btn btn-error">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
        <hr class="my-4"/>
    @endforeach
    <div class="flex justify-center">
        <button wire:click="add()" class="btn btn-primary">
            <i class="fas fa-plus"></i>
        </button>
    </div>
    <div class="flex items-center justify-between mt-10">
        <button wire:click="back" class="btn btn-secondary">
            <i class="fas fa-arrow-left fa-fw mr-3"></i>back
        </button>
        <button wire:click="save" class="btn btn-primary">
            <i class="fas fa-arrow-right fa-fw mr-3"></i>Next
        </button>
    </div>
</div>
