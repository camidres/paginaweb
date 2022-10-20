<header class="bg-white top-0 sticky " style="z-index: 900" x-data="dropdown()">
    <div class=" container flex items-center h-16 justify-between md:justify-start">




        <a href="/" class=" mr-2">
            <x-jet-application-mark class="block h-9 " />
        </a>

        <div class="mx-6 flex-1 hidden md:block   ">
            @livewire('search')
        </div>





        <div class="mx-6  mt-2 ">
            @livewire('dropdown-cart')
        </div>

        <div class=" mx-4 relative ">
            @auth


                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">

                        <button
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-10 w-10 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}"
                                alt="{{ Auth::user()->name }}" />
                        </button>

                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-6 py-4 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('orders.index') }}">
                            Mis ordenes
                        </x-jet-dropdown-link>

                        @role('admin')
                            <x-jet-dropdown-link href="{{ route('admin.index') }}">
                                Administrador
                            </x-jet-dropdown-link>
                        @endrole



                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">

                    <x-slot name="trigger">

                        <i class="fas fa-user-circle text-blue-400 text-4xl cursor-pointer">

                        </i>

                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Acceder') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Registrarse') }}
                        </x-jet-dropdown-link>



                    </x-slot>

                </x-jet-dropdown>


            @endauth
        </div>

    </div>

    {{-- buscador mobil --}}

    <div class=" mx-4 flex-1 md:hidden lg:hidden    ">
        @livewire('search')
    </div>


    <div class="  bg-blue-500 h-8 w-full text-center hidden md:block">



        <nav class="container " style="z-index: 900">

            <div class="">

                <ul class="flex  text-sm font-medium md:flex-row md:space-x-8 md:mt-0">
                    @foreach ($categories as $category)
                        <li class="navigation-link w-full mt-2">
                            <a href="{{ route('categories.show', $category) }}"
                                class="   font-medium text-white  md:w-auto ">

                                {{ $category->name }}

                            </a>

                            <div class="navigation-submenu bg-gray-100 border-t-4 border-emerald-300 w-3/4 h-full  hidden">

                                <x-navigation-subcategories :category="$category" />
                            </div>



                        </li>
                    @endforeach
                </ul>


            </div>


        </nav>
    </div>


</header>
