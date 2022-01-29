<div>
    <h3 class="text-2xl font-semibold text-center mb-5">Languages Known</h3>
    @foreach($languages as $language_name=>$language)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <div class="form-control">
                <label class="cursor-pointer label justify-start">
                    <input type="checkbox" name="{{ $language_name }}_checked" wire:model="languages.{{ $language_name }}.is_check"
                           class="checkbox checkbox-primary mr-2"
                           value="1">
                    <span class="label-text">{{ $language_name }}</span>
                </label>
            </div>
            <div class="form-control lg:col-span-2">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
                    <div class="form-control">
                        <label class="cursor-pointer label justify-start">
                            <input type="checkbox" name="{{ $language_name }}_read" wire:model="languages.{{ $language_name }}.read"
                                   class="checkbox checkbox-primary mr-2"
                                   value="1" @empty($languages[$language_name]['is_check']) disabled @endif>
                            <span class="label-text">Read</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="cursor-pointer label justify-start">
                            <input type="checkbox" name="{{ $language_name }}_write" wire:model="languages.{{ $language_name }}.write"
                                   class="checkbox checkbox-primary mr-2"
                                   value="1" @empty($languages[$language_name]['is_check']) disabled @endif>
                            <span class="label-text">Write</span>
                        </label>
                    </div>
                    <div class="form-control">
                        <label class="cursor-pointer label justify-start">
                            <input type="checkbox" name="{{ $language_name }}_speak" wire:model="languages.{{ $language_name }}.speak"
                                   class="checkbox checkbox-primary mr-2"
                                   value="1" @empty($languages[$language_name]['is_check']) disabled @endif>
                            <span class="label-text">Speak</span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <hr class="my-4"/>
    @endforeach
    <div class="flex items-center justify-between mt-10">
        <button wire:click="back" class="btn btn-secondary">
            <i class="fas fa-arrow-left fa-fw mr-3"></i>back
        </button>
        <button wire:click="save" class="btn btn-primary">
            <i class="fas fa-arrow-right fa-fw mr-3"></i>Next
        </button>
    </div>
</div>
