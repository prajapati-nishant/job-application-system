<div class="container mx-auto px-4">
    <div class="py-8">
        <div class="flex flex-row mb-3 justify-between w-full">
            <h2 class="text-2xl leading-tight">
                Applications
            </h2>
        </div>
        <div class="flex flex-col">
            <div class="grid grid-cols-1">
                <div class="py-3 text-center md:text-right">
                    @include('admin.partials.search')
                </div>
            </div>
        </div>

        <div class="py-4 overflow-x-auto">
            <div class="block">
                @if(!empty($list) && count($list))
                    <div class="flex w-full justify-end my-3">
                        @include('admin.partials.sort-by')
                    </div>
                    @foreach($list as $application)
                        <div class="card bg-white shadow-xl mb-2">
                            <div class="card-body">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    <p>First Name: <b>{{ $application->first_name }}</b></p>
                                    <p>Last Name: <b>{{ $application->last_name }}</b></p>
                                    <p>Email: <b>{{ $application->email }}</b></p>
                                    <p>Submitted on: <b>{{ $application->created_at }}</b></p>
                                </div>
                                <div class="mt-4 md:text-right">
                                    <div class="actions">
                                        <a class="btn btn-sm btn-info" target="_blank" href="{{ route('admin.applications.view',['application'=>$application['id']]) }}">
                                            <i class="fa fa-eye fa-fw"></i>
                                            <span class="ml-2">View</span>
                                        </a>
                                        <a class="btn btn-sm btn-primary" target="_blank" href="{{ route('admin.applications.edit',['application'=>$application['id']]) }}">
                                            <i class="fa fa-edit fa-fw"></i>
                                            <span class="ml-2">Edit</span>
                                        </a>
                                        <button class="btn btn-sm btn-error" wire:click="delete( {{$application}} )">
                                            <i class="fa fa-trash-alt fa-fw"></i>
                                            <span class="ml-2">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="card bg-white shadow-xl mb-2">
                        <div class="card-body text-center">
                            <h4 class="text-lg text-gray-500">No Application Found</h4>
                        </div>
                    </div>
                @endif
            </div>
            <div class="py-3">
                {!! $list->links() !!}
            </div>
        </div>
    </div>
</div>
