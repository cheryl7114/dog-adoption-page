@extends('layouts.app')

@section('content')
<div class="relative py-16">
    <!-- Background image with overlay -->
    <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('{{ asset('storage/images/dogs/dog_background.jpg') }}'); filter: brightness(0.3)"></div>
    
    <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
        <div class="max-w-3xl mx-auto">
            <!-- Page Title -->
            <h1 class="text-4xl font-extrabold text-center text-white mb-8">Support Our Mission</h1>
            
            <!-- Success Message -->
            @if(session('success'))
                <div class="mb-8 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    <strong class="font-bold">Thank you!</strong>
                    <p>{{ session('success') }}</p>
                </div>
            @endif
            
            <div class="bg-white rounded-lg shadow-xl overflow-hidden">
            <!-- Donation Info Section -->
            <div class="p-6 md:p-8 bg-white text-gray-800">
                <h2 class="text-2xl font-bold mb-4">Make a Difference Today</h2>
                <p class="mb-4">Your donation helps us rescue, care for, and find homes for dogs in need. Every euro makes a difference in a dog's life.</p>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-center">
                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-4 rounded-lg text-white">
                        <span class="block text-3xl font-bold mb-2">€25</span>
                        <span class="block text-sm">Feeds a dog for two weeks</span>
                    </div>
                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-4 rounded-lg text-white">
                        <span class="block text-3xl font-bold mb-2">€50</span>
                        <span class="block text-sm">Provides medical care for one dog</span>
                    </div>
                    <div class="bg-gradient-to-r from-orange-500 to-amber-500 p-4 rounded-lg text-white">
                        <span class="block text-3xl font-bold mb-2">€100</span>
                        <span class="block text-sm">Sponsors a dog's full adoption journey</span>
                    </div>
                </div>
            </div>

                <!-- Donation Form -->
                <div class="p-6 md:p-8">
                    <h3 class="text-xl font-semibold mb-6">Choose Your Donation Method</h3>
                    
                    <!-- Donation Tabs -->
                    <div x-data="{ tab: 'paypal' }" class="mb-8">
                        <div class="flex border-b border-gray-200">
                            <button @click="tab = 'paypal'" 
                                    :class="{'border-b-2 border-orange-500 text-orange-600': tab === 'paypal'}"
                                    class="py-2 px-4 font-medium">
                                PayPal
                            </button>
                            <button @click="tab = 'card'" 
                                    :class="{'border-b-2 border-orange-500 text-orange-600': tab === 'card'}"
                                    class="py-2 px-4 font-medium">
                                Credit Card
                            </button>
                        </div>
                        
                        <!-- PayPal Panel -->
                        <div x-show="tab === 'paypal'" class="mt-6">
                            <p class="mb-4 text-gray-600">Make a secure donation through PayPal</p>
                            
                            <!-- PayPal Button Container -->
                            <div class="flex flex-col space-y-4">
                                <div id="paypal-button-container" style="min-height:150px"></div>
                                
                                <!-- Custom Amount -->
                                <div class="mt-4">
                                    <label for="custom-amount" class="block text-sm font-medium text-gray-700 mb-1">Or enter a custom amount:</label>
                                    <div class="flex">
                                        <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500">€</span>
                                        <input type="number" min="1" id="custom-amount" name="amount" class="focus:ring-orange-500 focus:border-orange-500 flex-1 block w-full rounded-none rounded-r-md border-gray-300" placeholder="50">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Additional Info -->
                <div class="p-6 md:p-8 bg-gray-50 border-t">
                    <h3 class="text-lg font-medium mb-4">Other Ways to Help</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                  </svg>
                                <h4 class="font-medium">Volunteer</h4>
                            </div>
                            <p class="text-sm text-gray-600">Help walk, socialize, and care for our dogs.</p>
                        </div>
                        <div>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                </svg>
                                <h4 class="font-medium">Sponsor a Dog</h4>
                            </div>
                            <p class="text-sm text-gray-600">Provide monthly support for a specific dog.</p>
                        </div>
                        <div>
                            <div class="flex items-center mb-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-orange-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                                </svg>
                                <h4 class="font-medium">Supply Donations</h4>
                            </div>
                            <p class="text-sm text-gray-600">Donate food, toys, beds, and other supplies.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Success Modal -->
<div x-data="{ open: false, donorName: '', donationAmount: '' }" 
     x-show="open" 
     @payment-success.window="open = true; donorName = $event.detail.name; donationAmount = $event.detail.amount"
     class="fixed inset-0 z-50 overflow-y-auto" 
     x-cloak>
    
    <!-- Background overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"></div>
    
    <div class="flex items-center justify-center min-h-screen p-4">
        <!-- Modal content -->
        <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all max-w-lg w-full"
             x-show="open"
             x-transition:enter="ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100">
            
            <!-- Success icon -->
            <div class="bg-gradient-to-r from-green-500 to-green-600 py-6 px-6 flex items-center justify-center">
                <svg class="h-16 w-16 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            
            <!-- Content -->
            <div class="p-6">
                <h3 class="text-xl font-bold text-gray-900 mb-4">Donation Successful!</h3>
                <p class="text-gray-700 mb-3">Thank you, <span x-text="donorName" class="font-semibold"></span>! Your donation of <span x-text="'€' + donationAmount" class="font-semibold"></span> has been processed successfully.</p>
                <p class="text-gray-600 text-sm mb-4">Your generosity will help us care for dogs in need and find them loving homes.</p>
                
                <!-- Dogs celebrating image -->
                <div class="rounded-md overflow-hidden mb-4">
                    <img src="{{ asset('storage/images/dogs/happy-dog.jpg') }}" alt="Happy Dogs" class="w-full h-auto" onerror="this.style.display='none'">
                </div>
                
                <div class="flex justify-end mt-4">
                    <button @click="open = false" class="px-4 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:ring-offset-2">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- Include Alpine.js if not already included -->
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<!-- PayPal SDK -->
<script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_CLIENT_ID') }}&currency=EUR"></script>

<script>
    // Custom amount for PayPal
    document.getElementById('custom-amount').addEventListener('input', function() {
        document.getElementById('paypal-amount').value = this.value;
    });
    // Initialize PayPal buttons
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: document.getElementById('custom-amount').value || '50' // Default to €50 if no custom amount
                    },
                    description: "Donation to Adogtion"
                }]
            });
        },
        
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(details) {
                // Show a success message
                window.dispatchEvent(new CustomEvent('payment-success', { 
                detail: { 
                name: details.payer.name.given_name,
                amount: document.getElementById('custom-amount').value || '50'
                }
                }));
                
                // Optional: Submit to your server for record keeping
                fetch('/donate/process', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        orderID: data.orderID,
                        details: details
                    })
                });
            });
        }
    }).render('#paypal-button-container');
</script>
@endpush