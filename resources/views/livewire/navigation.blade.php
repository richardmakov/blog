<nav class="bg-gradient-to-r from-indigo-900 via-blue-700 to-cyan-400  p-2" x-data= "{open: false}">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
        <div class="relative flex h-16 items-center justify-start">

            <div class="absolute inset-y-0 left-0 flex justify-end items-center sm:hidden">
                <!-- Mobile menu button-->
                <button x-on:click="open = true" type="button"
                    class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="absolute -inset-0.5"></span>

                    <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                    <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                <a href="/" class="flex flex-shrink-0 items-center">
                    <img class="w-16 h-16 transition-transform transform hover:scale-110" src="{{ asset('logo.png') }}"
                        alt="Aviation Blog">
                </a>
                <div class="hidden m-auto sm:ml-6 sm:block">
                    <div class="flex space-x-4">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        {{-- <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">Dashboard</a> --}}
                        @foreach ($categories as $category)
                            <a href="{{ route('posts.category', $category) }}"
                                class= " transition duration-250 ease-in text-white hover:bg-blue-500 hover:text-white rounded-md px-3 py-2 text-sm font-medium">{{ $category->name }}</a>
                        @endforeach


                    </div>
                </div>
            </div>
            @auth
                <div class=" inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                    {{--  <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>

                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button> --}}
                    <a href="{{ route('cambiar-idioma', 'es') }}" class="block px-2 py-1 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md mr-2">ES</a>
                    <a href="{{ route('cambiar-idioma', 'en') }}" class="block px-2 py-1 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md mr-2">EN</a>


                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{ open: false }">
                        <div>
                            <button x-on:click="open = true" type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>

                                <img class="h-8 w-8 rounded-full" src="{{ auth()->user()->profile_photo_url }}"
                                    alt="">
                            </button>
                        </div>

                        <div x-show="open" x-on:click.away="open = false"
                            class="absolute mt-3 right-0 z-10 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            {{-- <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700"
                                role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a> --}}

                            
                                <a href="{{ route('admin.home') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-0">{{ __('Dashboard') }}</a>
                           
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-sm text-gray-700"
                                    role="menuitem" tabindex="-1" id="user-menu-item-2"
                                    @click.prevent="$root.submit();">{{ __('Sign out') }}</a>
                            </form>
                        </div>
                    </div>

                </div>
            @else
            <a href="{{ route('cambiar-idioma', 'es') }}" class="block px-2 py-1 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md mr-2">ES</a>
                    <a href="{{ route('cambiar-idioma', 'en') }}" class="block px-2 py-1 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md mr-2">EN</a>
                <div class="flex flex-row">
                    
                    <a href="{{ route('login') }}"
                        class=" block px-4 py-2 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md mr-2"
                        id="user-menu-item-2">{{ __('Login') }}</a>
                    <a href="{{ route('register') }}"
                        class="block px-4 py-2 text-sm transition duration-250 ease-in text-white hover:bg-blue-500 rounded-md"
                        id="user-menu-item-2">{{ __('Register') }}</a>
                </div>
            @endauth
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" x-show = "open" x-on:click.away="open = false" id="mobile-menu">
        <div class="space-y-1 px-2 pb-3 pt-2">
            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
            {{-- <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                aria-current="page">Dashboard</a> --}}
            @foreach ($categories as $category)
                <a href="{{ route('posts.category', $category) }}"
                    class="text-white hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">{{ $category->name }}</a>
            @endforeach


        </div>
    </div>
</nav>
