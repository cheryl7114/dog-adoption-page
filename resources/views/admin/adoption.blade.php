@extends('layouts.admin')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold mb-8">Adoption Requests</h1>

        {{-- Search Form --}}
        <form method="GET" class="mb-8">
            <div class="flex flex-col sm:flex-row items-stretch gap-2">
                <div class="relative w-full max-w-xs">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-400">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-4.35-4.35M17 11A6 6 0 105 11a6 6 0 0012 0z"/>
                        </svg>
                    </span>
                    <input
                        type="text"
                        name="search"
                        value="{{ request('search') }}"
                        placeholder="Search by applicant, dog, or email"
                        class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-orange-500 focus:border-orange-500 w-full transition"
                    >
                </div>
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded-lg font-semibold shadow hover:bg-orange-600 transition">
                    Search
                </button>
                @if(request('search'))
                    <a href="{{ route('admin.adoption', request()->except('search')) }}"
                       class="flex items-center px-4 py-2 text-gray-500 bg-gray-100 rounded-lg hover:text-orange-600 hover:bg-orange-50 transition text-sm font-medium">
                        Clear
                    </a>
                @endif
            </div>
        </form>

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="overflow-x-auto relative">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 overflow-visible">
                    <tr>
                        <th class="py-3 px-6">#</th>
                        <th class="py-3 px-6">Dog</th>
                        <th class="py-3 px-6">Applicant</th>
                        {{-- Status filtering --}}
                        <th class="py-3 px-6 relative group overflow-visible">
                            <div class="inline-block w-full">
                                <button type="button"
                                    class="w-full flex items-center justify-between px-2 py-1 bg-gray-100 rounded hover:bg-gray-200 text-xs font-semibold text-gray-700"
                                    onclick="event.stopPropagation(); document.getElementById('status-dropdown').classList.toggle('hidden')"
                                >
                                    Status
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                    </svg>
                                </button>
                                <div id="status-dropdown" class="absolute left-0 top-full mt-2 w-32 bg-white border rounded shadow-lg z-50 hidden"
                                    onclick="event.stopPropagation()">
                                    <a href="{{ route('admin.adoption', request()->except(['status','page'])) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 {{ !request('status') ? 'font-bold text-orange-600' : '' }}">
                                        All
                                    </a>
                                    <a href="{{ route('admin.adoption', array_merge(request()->except('page'), ['status' => 'pending'])) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 {{ request('status') === 'pending' ? 'font-bold text-orange-600' : '' }}">
                                        Pending
                                    </a>
                                    <a href="{{ route('admin.adoption', array_merge(request()->except('page'), ['status' => 'approved'])) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 {{ request('status') === 'approved' ? 'font-bold text-green-700' : '' }}">
                                        Approved
                                    </a>
                                    <a href="{{ route('admin.adoption', array_merge(request()->except('page'), ['status' => 'rejected'])) }}"
                                        class="block px-4 py-2 text-sm hover:bg-gray-100 {{ request('status') === 'rejected' ? 'font-bold text-red-700' : '' }}">
                                        Rejected
                                    </a>
                                </div>
                            </div>
                        </th>
                        <th class="py-3 px-6">Actions</th>
                        <th class="py-3 px-6"></th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($adoptionRequests as $request)
                        <tr class="bg-white border-b">
                            <td class="py-4 px-6">{{ $request->id }}</td>
                            <td class="py-4 px-6">
                                <a href="{{ url('/dogs/'.$request->dog_id) }}" class="text-orange-600 hover:underline font-bold">
                                    {{ $request->dog->name ?? 'N/A' }}
                                </a>
                                <div class="text-xs text-gray-500">
                                    {{ $request->dog->breed ?? 'N/A' }} &bull; {{ $request->dog->age ?? 'N/A' }} yrs
                                </div>
                            </td>
                            <td class="py-4 px-6">
                                <div class="font-semibold">{{ $request->user->name ?? 'N/A' }}</div>
                            </td>
                            <td class="py-4 px-6">
                                <span class="px-2 py-1 text-xs rounded-full font-semibold
                                    @if($request->status == 'pending') bg-yellow-100 text-yellow-800
                                    @elseif($request->status == 'approved') bg-green-100 text-green-800
                                    @else bg-red-100 text-red-800 @endif">
                                    {{ ucfirst($request->status) }}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                @if($request->status == 'pending')
                                    <div class="flex gap-2">
                                        <form action="{{ route('admin.adoption.approve', $request) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded hover:bg-green-600 transition text-xs font-semibold">Approve</button>
                                        </form>
                                        <form action="{{ route('admin.adoption.reject', $request) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 transition text-xs font-semibold">Reject</button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-400 text-xs">Completed</span>
                                @endif
                            </td>
                            <td class="py-4 px-6 text-right">
                                <button
                                    type="button"
                                    class="inline-flex items-center justify-center bg-orange-100 text-orange-600 hover:bg-orange-200 rounded-full w-8 h-8 focus:outline-none"
                                    title="View Details"
                                    onclick="showModal('modal-{{ $request->id }}')"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </button>
                                <!-- Modal -->
                                <div id="modal-{{ $request->id }}" class="fixed inset-0 z-50 hidden bg-black bg-opacity-40 flex items-center justify-center">
                                    <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full p-6 sm:p-8 relative text-left">
                                        <button type="button"
                                            onclick="hideModal('modal-{{ $request->id }}')"
                                            class="absolute top-4 right-4 text-gray-400 hover:text-orange-600 text-3xl font-bold focus:outline-none"
                                            aria-label="Close"
                                        >&times;</button>
                                        <div class="mb-6 border-b pb-4">
                                            <h2 class="text-2xl font-bold text-orange-600 mb-1 text-left">Adoption Request #{{ $request->id }}</h2>
                                            <div class="text-sm text-gray-500 text-left">Submitted by <span class="font-semibold">{{ $request->user->name ?? 'N/A' }}</span></div>
                                        </div>
                                        <div class="space-y-3">
                                            <div>
                                                <span class="font-semibold">Dog:</span>
                                                <a href="{{ url('/dogs/'.$request->dog_id) }}" class="text-orange-600 hover:underline font-bold">
                                                    {{ $request->dog->name ?? 'N/A' }}
                                                </a>
                                            </div>
                                            <div>
                                                <span class="font-semibold">Applicant:</span>
                                                {{ $request->user->name ?? 'N/A' }}
                                            </div>
                                            <div>
                                                <span class="font-semibold">Email:</span>
                                                <a href="mailto:{{ $request->contact_email }}" class="underline">{{ $request->contact_email }}</a>
                                            </div>
                                            <div>
                                                <span class="font-semibold">Phone:</span>
                                                <a href="tel:{{ $request->contact_phone }}" class="underline">{{ $request->contact_phone }}</a>
                                            </div>
                                            <div>
                                                <span class="font-semibold">Status:</span>
                                                <span class="px-3 py-1 text-xs rounded-full font-semibold
                                                    @if($request->status == 'pending') bg-yellow-100 text-yellow-800
                                                    @elseif($request->status == 'approved') bg-green-100 text-green-800
                                                    @else bg-red-100 text-red-800 @endif">
                                                    {{ ucfirst($request->status) }}
                                                </span>
                                            </div>
                                            <div>
                                                <span class="font-semibold">Message:</span>
                                                <div class="bg-orange-50 rounded p-3 mt-1 text-gray-700 whitespace-pre-line text-left">{{ $request->message ?: '—' }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Modal -->
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-12 text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto mb-4 text-orange-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2a4 4 0 014-4h2a4 4 0 014 4v2M7 7a4 4 0 118 0 4 4 0 01-8 0z" />
                                </svg>
                                <p class="text-xl">No adoption requests found.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            @if($adoptionRequests->count())
                <div class="mt-8">
                    {{ $adoptionRequests->links() }}
                </div>
            @endif
        </div>
    </div>
</div>

<script>
document.addEventListener('click', function() {
    var dd = document.getElementById('status-dropdown');
    if(dd) dd.classList.add('hidden');
});
function showModal(id) {
    document.getElementById(id).classList.remove('hidden');
}
function hideModal(id) {
    document.getElementById(id).classList.add('hidden');
}
</script>
@endsection
