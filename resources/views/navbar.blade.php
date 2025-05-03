<nav class="bg-gradient-to-r from-orange-500 to-amber-500 shadow-lg">
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
            <div class="hidden md:flex items-center space-x-8">
                <a href="/" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Home</a>
                <a href="/dogs" class="text-white bg-orange-600 px-3 py-2 rounded-md font-medium">Available Dogs</a>
                <a href="/about" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">About Us</a>
                <a href="/contact" class="text-white hover:bg-orange-600 px-3 py-2 rounded-md font-medium">Contact</a>
                <a href="/donate" class="bg-white text-orange-600 hover:bg-yellow-100 px-4 py-2 rounded-md font-bold">Donate</a>
            </div>
            <!-- Mobile menu button -->
            <div class="flex md:hidden items-center">
                <button id="mobile-menu-button" class="text-white hover:bg-orange-600 p-2 rounded-md focus:outline-none">
                    <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
    <!-- Mobile menu panel -->
    <div id="mobile-menu" class="hidden md:hidden bg-orange-400">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="/" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">Home</a>
            <a href="/dogs" class="text-white bg-orange-600 block px-3 py-2 rounded-md font-medium">Available Dogs</a>
            <a href="/about" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">About Us</a>
            <a href="/contact" class="text-white block px-3 py-2 rounded-md font-medium hover:bg-orange-600">Contact</a>
            <a href="/donate" class="bg-white text-orange-600 block px-3 py-2 rounded-md font-bold hover:bg-yellow-100">Donate</a>
        </div>
    </div>
</nav>