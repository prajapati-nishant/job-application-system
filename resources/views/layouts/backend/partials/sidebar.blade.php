@php
    $navLinks = [
            (object)[
                "route" => 'admin.dashboard',
                "text" => 'Dashboard',
                "icon" => 'fa fa-home',
            ],
            (object)[
                "route" => 'admin.applications',
                "text" => 'Applications',
                "icon" => 'fas fa-file-alt',
            ],
        ];
@endphp


<div class="h-screen sidebar my-4 ml-4 shadow-lg relative w-80">
    <div class="bg-white h-full rounded-2xl dark:bg-gray-700">
        <div class="hidden md:flex items-center justify-center pt-6">
            <h1 class="text-2xl ">{{ config('app.name') }}</h1>
        </div>
        <div class="block md:hidden pt-6 px-4">
            <button type="button" id="close-sidebar">
                <i class="fa fa-arrow-left fa-fw"></i>
            </button>
        </div>
        <nav class="mt-6 side-nav">
            <div>
                @foreach ($navLinks as $link)
                        <a class="w-full font-thin uppercase
                        @if( Request::route()->getName() === $link->route)
                            text-blue-500 flex items-center p-4 my-2 transition-colors duration-200 justify-start bg-gradient-to-r from-white to-blue-100 border-r-4 border-blue-500 dark:from-gray-700 dark:to-gray-800 border-r-4 border-blue-500
                        @else
                            text-gray-500 dark:text-gray-200 flex items-center p-4 my-2 transition-colors duration-200 justify-start hover:text-blue-500
                        @endif"
                           href="{{ route($link->route) }}">
                            <i class="{{$link->icon}} fa-fw"></i>
                            <span class="mx-4 text-sm font-normal">{{$link->text}}</span>
                        </a>
                @endforeach
            </div>
        </nav>
    </div>
</div>
