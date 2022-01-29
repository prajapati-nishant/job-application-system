<header class="w-full shadow-lg bg-white dark:bg-gray-700 items-center h-16 rounded-2xl z-40">
    <div class="relative z-20 flex flex-col justify-center h-full px-3 mx-auto flex-center">
        <div class="relative items-center pl-1 flex w-full lg:max-w-68 sm:pr-2 sm:ml-0">
            <div class="container relative left-0 flex w-3/4 h-auto h-full ">
                <h1 class="md:hidden text-2xl">{{ config('app.name') }}</h1>
            </div>
            <div class="relative p-1 flex items-center justify-end w-1/4 sm:w-2/4 ml-5 md:mr-4 sm:mr-0 text-center">
                <a href="{{ route('home') }}" class="block text-lg p-1 ml-2 hover:text-primary" target="_blank">
                    <i class="fas fa-desktop fa-fw"></i>
                    <span class="text-2xs hidden md:inline-block">Visit Site</span>
                </a>
                <a href="{{ route('logout') }}" class="block text-lg p-1 ml-2 hover:text-primary">
                    <i class="fa fa-power-off fa-fw"></i>
                    <span class="text-2xs hidden md:inline-block">Logout</span>
                </a>
                <button id="sidebar-toggle" type="button"
                        class="block p-1 ml-1 md:hidden focus:outline-none sidebar-toggle"
                        aria-label="toggle menu">
                    <i class="fa fa-bars fa-fw"></i>
                </button>
            </div>
        </div>
    </div>
</header>
