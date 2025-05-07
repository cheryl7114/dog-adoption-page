<nav class="sticky top-0 z-50 bg-gradient-to-r from-orange-500/95 to-amber-500/95 backdrop-blur-sm shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <!-- Logo and brand -->
            <div class="flex items-center">
                <a href="/" class="flex items-center">
                    <span class="text-2xl font-bold text-white mr-1">🐶</span>
                    <span class="text-2xl font-extrabold text-white">Adogtion</span>
                </a>
            </div>
            <!-- Desktop menu -->
            <div class="hidden lg:flex items-center space-x-4">
                <a href="/" class="{{ Request::is('/') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">Home</a>
                <a href="/dogs" class="{{ Request::is('dogs*') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">Available Dogs</a>
                <a href="/about" class="{{ Request::is('about*') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">About Us</a>
                <a href="/contact" class="{{ Request::is('contact*') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">Contact</a>
                <a href="/donate" class="{{ Request::is('donate*') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">Donate</a>            </div>
            <!-- Auth Navigation -->
            <div class="hidden lg:flex items-center space-x-4">
                @guest
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="{{ route('login') }}" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Login</a>
                    <a href="{{ route('register') }}" class="bg-white text-orange-600 hover:bg-yellow-100 px-4 py-2 rounded-md font-bold">Register</a>
                </div>
                @else
                <div class="relative" x-data="{ open: false }" @click.away="open = false">
                    <button @click="open = !open" class="flex items-center text-sm font-medium text-white hover:bg-orange-600 px-3 py-2 rounded-md focus:outline-none transition duration-150 ease-in-out">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    
                    <div x-show="open" 
                         style="display: none;"
                         class="absolute right-0 mt-2 w-48 bg-white py-2 rounded-md shadow-lg z-50" 
                         x-transition:enter="transition ease-out duration-100" 
                         x-transition:enter-start="transform opacity-0 scale-95" 
                         x-transition:enter-end="transform opacity-100 scale-100">
                        
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Admin Dashboard</a>
                        @endif
                        
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                        <form method="POST" action="{{ route('logout') }}" id="logout-form">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </div>
                </div>
                @endguest
            </div>
            <!-- Mobile menu button -->
            <div class="flex lg:hidden items-center">
                <button id="mobile-menu-button" class="text-white hover:bg-orange-600 p-2 rounded-md focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu panel -->
    <div id="mobile-menu" class="hidden lg:hidden bg-orange-400">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="{{ Request::is('/') ? 'text-white bg-orange-600' : 'text-white hover:bg-orange-600' }} block px-3 py-2 rounded-md font-medium">Home</a>
            <a href="/dogs" class="{{ Request::is('dogs*') ? 'text-white bg-orange-600' : 'text-white hover:bg-orange-600' }} block px-3 py-2 rounded-md font-medium">Available Dogs</a>
            <a href="/about" class="{{ Request::is('about*') ? 'text-white bg-orange-600' : 'text-white hover:bg-orange-600' }} block px-3 py-2 rounded-md font-medium">About Us</a>
            <a href="/contact" class="{{ Request::is('contact*') ? 'text-white bg-orange-600' : 'text-white hover:bg-orange-600' }} block px-3 py-2 rounded-md font-medium">Contact</a>
            <a href="/donate" class="{{ Request::is('donate*') ? 'bg-orange-600 text-white' : 'text-white hover:bg-orange-600' }} px-3 py-2 rounded-md font-medium">Donate</a>            
            <!-- Mobile Auth Navigation -->
            @guest
                <a href="{{ route('login') }}" class="block text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Login</a>
                <a href="{{ route('register') }}" class="block bg-white text-orange-600 px-3 py-2 rounded-md font-bold hover:bg-yellow-100">Register</a>
            @else
                <a href="/profile" class="block text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">{{ Auth::user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full text-left text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">
                        Logout
                    </button>
                </form>
            @endguest
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>