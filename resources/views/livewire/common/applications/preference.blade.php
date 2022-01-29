<div>
    <h3 class="text-2xl font-semibold text-center">Preference</h3>
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4">
        <div class="form-control">
            <label class="label">
                <span class="label-text">Preferred Location</span>
            </label>
            <x-select name="preferred_location" wire:model="preferred_location" placeholder="Choose Location">
                <option value="{{null}}">Choose Location</option>
                @foreach(config('setting.available_locations') as $location)
                    <option value="{{$location}}">{{$location}}</option>
                @endforeach
            </x-select>
            @error('preferred_location')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Notice Period</span>
            </label>
            <input type="text" wire:model="notice_period" placeholder="Notice Period" class="input input-bordered">
            @error('notice_period')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Current CTC (Per Month)</span>
            </label>
            <input type="number"  min="1" wire:model="current_ctc" placeholder="Current CTC (Per Month)" class="input input-bordered">
            @error('current_ctc')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Expected CTC (Per Month)</span>
            </label>
            <input type="number"  min="1" wire:model="expected_ctc" placeholder="Expected CTC (Per Month)" class="input input-bordered">
            @error('expected_ctc')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
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
