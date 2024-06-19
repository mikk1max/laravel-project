<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700" style="background-color: #FFB302">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8" style="background-color: #FFB302">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" style="color: #181818" />
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="menuIco">
                        {{ __('Main page') }}
                    </x-nav-link>

                    <x-nav-link :href="route('comments')" :active="request()->routeIs('comments')" class="menuIco">
                        {{ __('Chat') }}
                    </x-nav-link>

                    <x-nav-link :href="route('shop')" :active="request()->routeIs('shop')" class="menuIco">
                        {{ __('Shop') }}
                    </x-nav-link>

                    <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')" class="menuIco">
                        {{ __('Orders') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        @auth
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                            <div >{{ Auth::user()->name }}</div>

                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                        @endauth
                    </x-slot>

                    <x-slot name="trigger">
                        @auth
                            <button class="inline-flex items-center px-3 py-2 border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300 transition ease-in-out duration-150" style="background-color: #FFB302; border: 0">
                                <div class="menuIco">{{ Auth::user()->name }}</div>

                                <div class="ms-1 menuIco">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        @endauth

                            @guest
                                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">

                                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')" class="menuIco">
                                        {{ __('Register') }}
                                    </x-nav-link>

                                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')" class="menuIco">
                                        {{ __('Login') }}
                                    </x-nav-link>

                                </div>
                            @endguest
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 transition duration-150 " style="background-color: transparent; border: 0; color: #181818">
                    More
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="menuIco" >
                {{ __('Dashboard') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('comments')" :active="request()->routeIs('comments')" class="menuIco">
                {{ __('Chat') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('shop')" :active="request()->routeIs('shop')" class="menuIco">
                {{ __('Shop') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('orders')" :active="request()->routeIs('orders')" class="menuIco">
                {{ __('Orders') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
            <div class="px-4">
                @auth
                <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                @endauth
            </div>


            <div class="mt-3 space-y-1">
                @auth
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                    @endauth

                    @guest
                    <x-responsive-nav-link :href="route('register')" :active="request()->routeIs('register')" class="menuIco">
                        {{ __('Register') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')" class="menuIco">
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                    @endguest
                </form>
            </div>



        </div>
    </div>
</nav>
