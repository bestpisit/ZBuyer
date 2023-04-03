<link href="{{asset('css/app.css')}}" rel="stylesheet">

<nav x-data="{ open: false }" class="navbar border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 sm:px-6 lg:px-8">
        <div class="flex h-20 justify-center">

            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex  ">


                <x-nav-link :href="route('aboutus')" :active="request()->routeIs('aboutus')">
                    {{ __('About us') }}
                </x-nav-link>


                <x-nav-link :href="route('home')" :active="request()->routeIs('home') || request()->routeIs('dashboard')">
                    {{ __('Home') }}
                </x-nav-link>

                <x-nav-link :href="route('products')" :active="request()->routeIs('products')">
                    {{ __('Products') }}
                </x-nav-link>


                <!-- Web banner -->
                <a class='bold font-semibold text-red-600 text-xl flex items-center static '><img width="100" height="75" src="https://scontent.fcnx4-1.fna.fbcdn.net/v/t1.15752-9/333051745_504587958535247_5183009897938179888_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=ae9488&_nc_eui2=AeG8g6H6dLRiJ8WVPWz8DO-P6g4Xc812r4zqDhdzzXavjHvTHXg-f9EjC7ss9ASJwYUsgtZG-6aFOdtFPM_HNU8E&_nc_ohc=CqoSQQYERjgAX9uzfWO&_nc_ht=scontent.fcnx4-1.fna&oh=03_AdTJP-kiGQbVrNnFgUaS9bbOjXNzb6Ur9SrcZorvENfW_Q&oe=6451C8FE" alt="Girl in a jacket">
                </a>
                <!-- Navigation Links -->

        
                <x-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                    <img src="/img/cart2.png" alt="cart">
                    {{ __('My Orders') }}
                </x-nav-link>

                <x-nav-link :href="route('wishlist')" :active="request()->routeIs('wishlist')">
                    {{ __('Wish List') }}
                </x-nav-link>


                <!-- Settings Dropdown -->
                <div class="hidden sm:flex sm:items-center sm:ml-6">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                                <div class=" ">{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
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
                <div class="-mr-2 flex items-center sm:hidden">
                    <button @click="open = ! open"
                        class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                        <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                            <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                            <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden"
                                stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div> <!-- End of Div aboutus product and banner !-->
        </div>

        <!-- Responsive Navigation Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('products')" :active="request()->routeIs('products')">
                    {{ __('Products') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('orders')" :active="request()->routeIs('orders')">
                    {{ __('My Orders') }}
                </x-responsive-nav-link>
            </div>
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('wishlist')" :active="request()->routeIs('wishlist')">
                    {{ __('Wish List') }}
                </x-responsive-nav-link>
            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
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
                    </form>
                </div>
            </div>
        </div>
</nav>

