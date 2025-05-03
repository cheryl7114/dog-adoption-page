<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gradient-to-b from-orange-50 to-amber-50">
        <div class="w-full sm:max-w-lg mt-6 px-8 py-10 bg-white shadow-lg overflow-hidden sm:rounded-xl">
            <div class="flex justify-center mb-6">
                <a href="/" class="flex items-center">
                    <span class="text-3xl font-bold text-orange-500 mr-1">🐶</span>
                    <span class="text-3xl font-extrabold text-orange-500">Adogtion</span>
                </a>
            </div>
            
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-8">Welcome Back</h2>
            
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                                <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </div>
                        <x-text-input id="email" 
                            class="block mt-1 w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500" 
                            type="email" 
                            name="email" 
                            :value="old('email')" 
                            required 
                            autofocus 
                            autocomplete="username" />
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mt-6">
                    <x-input-label for="password" :value="__('Password')" class="text-gray-700" />
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-text-input id="password" 
                            class="block mt-1 w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-orange-500 focus:border-orange-500"
                            type="password"
                            name="password"
                            required 
                            autocomplete="current-password" />
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input id="remember_me" 
                            type="checkbox" 
                            class="h-4 w-4 rounded border-gray-300 text-orange-500 focus:ring-orange-500" 
                            name="remember">
                        <label for="remember_me" class="ml-2 block text-sm text-gray-700">
                            {{ __('Remember me') }}
                        </label>
                    </div>
                
                    @if (Route::has('password.request'))
                        <a class="text-sm text-orange-600 hover:text-orange-700" 
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                </div>
                
                <!-- Login Button (separate row) -->
                <div class="mt-6">
                    <button type="submit" 
                        class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold py-3 rounded-lg shadow-md transition duration-150 ease-in-out">
                        {{ __('Log in') }}
                    </button>
                </div>
                
                <div class="mt-8 text-center">
                    <p class="text-sm text-gray-600">Don't have an account?
                        <a href="{{ route('register') }}" class="text-orange-600 hover:text-orange-700 font-semibold">Register here</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>