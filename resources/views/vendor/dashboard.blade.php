<x-app-layout>
    <div class="p-6 max-w-6xl mx-auto space-y-8">
        <div>
            <h1 class="text-3xl font-bold text-[#022954]">Welcome, {{ Auth::user()->name }}</h1>
            <p class="text-gray-500 mt-1">Here’s a quick look at your store performance.</p>
        </div>

        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-600">Total Products</p>
                <p class="text-3xl font-bold mt-1">{{ $productCount }}</p>
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-600">Orders Today</p>
                <p class="text-3xl font-bold mt-1">7</p> {{-- Replace with dynamic data later --}}
            </div>

            <div class="bg-white rounded-xl shadow p-6">
                <p class="text-gray-600">Revenue</p>
                <p class="text-3xl font-bold mt-1">MVR 2,300</p> {{-- Replace with dynamic data later --}}
            </div>
        </div>

        {{-- Quick Actions --}}
        <div class="flex flex-col">
            <div class="flex justify-between items-center mt-6">
                <h2 class="text-xl font-semibold text-[#022954]">Your Products</h2>
                <a href="{{ route('vendor.products.create') }}"
                    class="bg-[#022954] hover:bg-[#011e3f] text-white rounded-xl text-base font-semibold h-12 px-6 flex items-center justify-center shadow-md hover:shadow-xl transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-[#022954]/40">
                    + Add New Product
                </a>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-4">
                @forelse($products as $product)
                    <div class="bg-white rounded-xl shadow p-4">
                        @if ($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                                class="w-full h-40 object-cover rounded-md mb-2">
                        @endif

                        <h3 class="text-lg font-semibold text-[#022954]">
                            {{ $product->name }}
                        </h3>

                        <p class="text-gray-600 text-sm mt-1">
                            {{ $product->description }}
                        </p>

                        <p class="text-[#022954] font-bold mt-2">
                            MVR {{ number_format($product->price, 2) }}
                        </p>
                    </div>
                @empty
                    <p class="col-span-3 text-gray-500">
                        You have no products listed yet.
                    </p>
                @endforelse
            </div>

        </div>

        {{-- Recent Orders (Optional Future Section) --}}
        <div class="bg-white rounded-xl shadow p-6 mt-4">
            <h3 class="text-lg font-bold text-gray-800 mb-4">Recent Orders</h3>
            <p class="text-sm text-gray-500">No recent orders yet.</p>
            {{-- You can later loop through orders like: 
                @foreach ($recentOrders as $order)
                    <p>{{ $order->id }} - {{ $order->status }}</p>
                @endforeach
            --}}
        </div>
    </div>
</x-app-layout>
