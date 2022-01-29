<div>
    <h3 class="text-2xl font-semibold text-center mb-5">Technical Experience</h3>
    @foreach($experiences as $key=>$experience)
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
            <div class="form-control">
                <input type="text" wire:model="experiences.{{ $key }}.name" placeholder="Technology"
                       class="input input-bordered">
                @error('experiences.'.$key.'.name')
                <div class="text-red-500 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-control lg:col-span-2">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    @foreach($allowed_experiences as $level)
                        <div class="form-control">
                            <label class="cursor-pointer label justify-start">
                                <input type="radio" name="{{ $key }}_level"
                                       wire:model="experiences.{{ $key }}.experience"
                                       class="radio radio-primary mr-2"
                                       value="{{ $level }}" @empty($experiences[$key]['name']) disabled @endif>
                                <span class="label-text capitalize">{{ $level }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="flex w-full justify-end mt-2">
                <button wire:click="remove({{ $key }})" class="btn btn-error">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </div>
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
