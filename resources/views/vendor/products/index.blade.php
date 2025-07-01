<x-app-layout>
    <div class="py-6 px-4 max-w-5xl mx-auto">
        <h2 class="text-xl font-bold mb-4">Your Products</h2>

        <a href="{{ route('vendor.products.create') }}" class="mb-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
            ➕ Add New Product
        </a>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="border p-4 rounded shadow">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-40 object-cover mb-2 rounded" />
                    @endif
                    <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                    <p class="text-sm text-gray-600">{{ $product->description }}</p>
                    <p class="mt-2 font-semibold">MVR {{ number_format($product->price, 2) }}</p>

                    <!-- Edit and Delete buttons -->
                    <div class="mt-4 flex justify-between items-center">
                        <a href="{{ route('vendor.products.edit', $product) }}" class="text-sm text-blue-600 hover:underline">✏️ Edit</a>

                        <form action="{{ route('vendor.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Delete this product?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-sm text-red-600 hover:underline">🗑️ Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p>No products found. Start by <a href="{{ route('vendor.products.create') }}" class="text-blue-600 underline">adding one</a>.</p>
            @endforelse
        </div>
    </div>
</x-app-layout>