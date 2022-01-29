<header>
    <nav class="bg-white shadow dark:bg-gray-800">
        <div class="container px-6 py-4 mx-auto">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-between">
                    <div class="text-xl font-semibold text-gray-700">
                        <a class="text-2xl font-bold text-gray-800 dark:text-white lg:text-3xl hover:text-gray-700 dark:hover:text-gray-300" href="{{ route('home') }}">{{config('app.name')}}</a>
                    </div>
                </div>
                {{-- Desktop Menu --}}
                <div class="mx-4 lg:flex lg:items-center">
                    @auth
                        <a href="{{ route('admin.dashboard')  }}" class="block mx-4 mt-2 text-sm text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400">Dashboard</a>

                        <a href="{{ route('logout') }}" class="block mx-4 mt-2 text-sm text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400">Logout</a>

                    @else

                        <a href="{{ route('login') }}" class="block mx-4 mt-2 text-sm text-gray-700 capitalize lg:mt-0 dark:text-gray-200 hover:text-blue-600 dark:hover:text-indigo-400">Login</a>


                    @endauth

                </div>
            </div>
        </div>
    </nav>


</header>
