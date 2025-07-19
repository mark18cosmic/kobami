<x-app-layout>
    <div class="max-w-7xl mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Latest Products</h1>

        @if($products->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($products as $product)
                    <div class="bg-white rounded-xl shadow p-4 flex flex-col">
                        @if ($product->image_path)
                            <img src="{{ asset('storage/' . $product->image_path) }}"
                                 alt="{{ $product->name }}"
                                 class="w-full h-40 object-cover rounded mb-2" />
                        @endif

                        <h3 class="text-lg font-semibold">{{ $product->name }}</h3>
                        <p class="text-sm text-gray-600">{{ Str::limit($product->description, 100) }}</p>
                        <p class="text-sm font-bold text-[#022954] mt-2">MVR {{ number_format($product->price, 2) }}</p>

                        <a href="{{ route('vendors.show', $product->vendor->id) }}"
                           class="block mt-2 text-xs text-gray-500 hover:text-gray-700">
                            By {{ $product->vendor->name }}
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="mt-6">
                {{ $products->links() }}
            </div>
        @else
            <p class="text-gray-500">No products available yet.</p>
        @endif
    </div>
</x-app-layout>
