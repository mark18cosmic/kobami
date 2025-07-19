<x-app-layout>
    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex flex-col sm:flex-row sm:items-center gap-6 mb-10">
            @if ($vendor->profile_picture)
                <img src="{{ asset('storage/' . $vendor->profile_picture) }}" alt="{{ $vendor->name }}" class="w-32 h-32 rounded-full object-cover">
            @endif
            <div>
                <h1 class="text-2xl font-bold">{{ $vendor->name }}</h1>
                <p class="text-gray-600">Vendor Profile</p>
            </div>
        </div>

        <h2 class="text-xl font-semibold mb-4">Products</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="border p-4 rounded shadow">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover mb-2 rounded" />
                    @endif
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->description }}</p>
                    <p class="mt-2 font-semibold">MVR {{ number_format($product->price, 2) }}</p>
                </div>
            @empty
                <p>No products available.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>
