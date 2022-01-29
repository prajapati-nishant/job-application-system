<div>
    <h3 class="text-2xl font-semibold text-center">Basic Info</h3>
    <div class="grid grid-cols-1 lg:grid-cols-4 gap-4">
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">First Name</span>
            </label>
            <input type="text" wire:model="first_name" placeholder="First Name" class="input input-bordered">
            @error('first_name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">Last Name</span>
            </label>
            <input type="text" wire:model="last_name" placeholder="Last Name" class="input input-bordered">
            @error('last_name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label class="label">
                <span class="label-text">Gender</span>
            </label>
            <div class="mt-2 grid grid-cols-2 gap-4">
                <div class="form-control">
                    <label class="cursor-pointer label justify-start">
                        <input type="radio" name="gender" wire:model="gender" class="radio radio-primary mr-2"
                               value="male">
                        <span class="label-text">Male</span>
                    </label>
                </div>
                <div class="form-control">
                    <label class="cursor-pointer label justify-start">
                        <input type="radio" name="gender" wire:model="gender" class="radio radio-primary mr-2"
                               value="female">
                        <span class="label-text">Female</span>
                    </label>
                </div>
            </div>
        </div>
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">Email</span>
            </label>
            <input type="email" wire:model="email" placeholder="Email" class="input input-bordered">
            @error('email')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Phone</span>
            </label>
            <input type="text" maxlength="10" wire:model="phone" placeholder="Phone" class="input input-bordered">
            @error('phone')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">Address Line 1</span>
            </label>
            <input type="text" wire:model="line_1" placeholder="Address Line 1" class="input input-bordered">
            @error('line_1')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">Address Line 2</span>
            </label>
            <input type="text" wire:model="line_2" placeholder="Address Line 2" class="input input-bordered">
            @error('line_2')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control lg:col-span-2">
            <label class="label">
                <span class="label-text">City</span>
            </label>
            <input type="text" wire:model="city" placeholder="City" class="input input-bordered">
            @error('city')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">State</span>
            </label>
            <input type="text" wire:model="state" placeholder="State" class="input input-bordered">
            @error('state')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-control">
            <label class="label">
                <span class="label-text">Zip</span>
            </label>
            <input type="text" maxlength="8" wire:model="zip" placeholder="Zip" class="input input-bordered">
            @error('zip')
            <div class="text-red-500 text-sm">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="flex items-center justify-end mt-10">
        <button wire:click="save" class="btn btn-primary t">
            <i class="fas fa-arrow-right fa-fw mr-3"></i>Next
        </button>
    </div>
</div>
