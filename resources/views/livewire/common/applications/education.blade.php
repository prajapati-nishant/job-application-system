<div>
    <h3 class="text-2xl font-semibold text-center">Education Details</h3>
    @foreach($educations as $key=>$education)
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Degree/Certificate</span>
                </label>
                <input type="text" wire:model="educations.{{ $key }}.degree" placeholder="Degree or Certificate Name"
                       class="input input-bordered">
                @error('educations.'.$key.'.degree')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">University/Board</span>
                </label>
                <input type="text" wire:model="educations.{{ $key }}.university" placeholder="University or Board Name"
                       class="input input-bordered">
                @error('educations.'.$key.'.university')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Year of Passing</span>
                </label>
                <input type="text" maxlength="4" wire:model="educations.{{ $key }}.year" placeholder="Year of Passing"
                       class="input input-bordered">
                @error('educations.'.$key.'.year')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Percentage/CGPA</span>
                </label>
                <input type="text" wire:model="educations.{{ $key }}.grade" placeholder="Percentage or CGPA"
                       class="input input-bordered">
                @error('educations.'.$key.'.grade')
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
