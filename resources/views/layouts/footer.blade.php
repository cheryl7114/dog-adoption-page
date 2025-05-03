<!-- filepath: c:\Users\Harris\Documents\Studies\YEAR2 SEM2\Server side Development\CA3\dog-adoption-page\resources\views\footer.blade.php -->
<footer class="bg-gradient-to-r from-orange-500 to-amber-500 text-white">
    <!-- Main Footer Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Brand Column -->
            <div class="md:col-span-1">
                <div class="flex items-center mb-4">
                    <span class="text-3xl mr-2">🐶</span>
                    <span class="text-2xl font-bold">Adogtion</span>
                </div>
                <p class="text-white/80 mb-4">
                    Finding forever homes for furry friends since 2025. Our mission is to connect loving families with dogs in need.
                </p>
            </div>
            
            <!-- Quick Links -->
            <div class="md:col-span-1">
                <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Quick Links</h3>
                <ul class="space-y-2">
                    <li><a href="/dogs" class="hover:text-yellow-200 transition">Available Dogs</a></li>
                    <li><a href="/about" class="hover:text-yellow-200 transition">About Us</a></li>
                    <li><a href="/adoption-process" class="hover:text-yellow-200 transition">Adoption Process</a></li>
                    <li><a href="/faqs" class="hover:text-yellow-200 transition">FAQs</a></li>
                </ul>
            </div>
            
            <!-- Contact Info -->
            <div class="md:col-span-1">
                <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Contact Us</h3>
                <ul class="space-y-2">
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>
                        <span>123 Paw Street, Dublin, Ireland</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                        <span>contact@adogtion.com</span>
                    </li>
                    <li class="flex items-start">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                        </svg>
                        <span>+353 (01) 234 5678</span>
                    </li>
                </ul>
            </div>
            
            <!-- Newsletter Signup -->
            <div class="md:col-span-1">
                <h3 class="font-bold text-lg mb-4 border-b border-white/20 pb-2">Stay Updated</h3>
                <p class="text-white/80 mb-4">Subscribe to our newsletter for updates on new dogs and adoption events.</p>
                <form class="flex flex-col space-y-2">
                    <input type="email" placeholder="Your email address" class="px-4 py-2 rounded bg-white/20 border border-white/30 focus:outline-none focus:ring-2 focus:ring-white placeholder-white/50 text-white">
                    <button type="submit" class="bg-white text-orange-600 font-medium py-2 px-4 rounded hover:bg-yellow-100 transition">Subscribe</button>
                </form>
            </div>
        </div>
        
        <!-- Social Media Links -->
        <div class="mt-8 pt-8 border-t border-white/20 flex flex-col md:flex-row justify-between items-center">
            <div class="text-white/80 mb-4 md:mb-0">
                © {{ date('Y') }} Adogtion. All rights reserved.
            </div>
            <div class="flex space-x-4">
                <a href="#" class="text-white hover:text-yellow-200 transition">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"></path></svg>
                </a>
                <a href="#" class="text-white hover:text-yellow-200 transition">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="#" class="text-white hover:text-yellow-200 transition">
                    <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                </a>
            </div>
        </div>
    </div>
</footer>