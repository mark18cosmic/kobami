<x-app-layout>
    <div class="py-6 px-4 m-6">
        <div class="flex flex-row justify-between items-center mb-4">
            <h2 class="text-2xl font-bold">Your Products</h2>

            <a href="{{ route('vendor.products.create') }}"
                class="bg-[#022954] hover:bg-[#011e3f] text-white 
                            rounded-xl font-semibold font-sans 
                            h-12 sm:h-14 px-4 sm:px-6 text-base sm:text-lg 
                            flex items-center justify-center 
                            shadow-md hover:shadow-xl transition-all duration-200 
                            focus:outline-none focus:ring-4 focus:ring-[#022954]/40

    ">
                New Product
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($products as $product)
                <div class="border rounded-xl shadow hover:shadow-lg transition-shadow duration-300 p-5 flex flex-col">
                    @if ($product->image_path)
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}"
                            class="w-full h-48 object-cover rounded-md mb-4" />
                    @endif

                    <div class='flex justify-between'>
                        <h3 class="text-lg font-semibold text-[#022954] mb-1 truncate" title="{{ $product->name }}">
                            {{ $product->name }}
                        </h3>
                        <a href="{{ route('vendor.products.edit', $product) }}"
                        class=" sm:w-auto inline-block px-3 sm:px-6 py-2 sm:py-3 text-sm sm:text-base font-semibold text-white bg-[#022954] hover:bg-[#011e3f] rounded-xl transition">
                        Edit
                        </a>

                    </div>
                    <p class="text-sm text-gray-600 flex-grow overflow-hidden line-clamp-3 mb-3"
                        title="{{ $product->description }}">
                        {{ $product->description }}
                    </p>
                    <div class="flex justify-between">
                        <p class="mt-auto font-semibold text-[#022954] text-lg mb-4">
                            MVR {{ number_format($product->price, 2) }}
                        </p>

                        <form action="{{ route('vendor.products.destroy', $product) }}" method="POST"
                            onsubmit="return confirm('Delete this product?')" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                            class="w-full sm:w-auto text-sm sm:text-base text-white bg-red-500 hover:bg-red-700 inline-block px-3 sm:px-5 py-2 sm:py-3 rounded-xl items-center gap-1 transition">
                            Delete
                            </button>
                        </form>

                    </div>

                </div>
            @empty
                <p class="col-span-full text-center text-gray-500">
                    No products found. Start by
                    <a href="{{ route('vendor.products.create') }}"
                        class="text-blue-600 underline hover:text-blue-700">adding one</a>.
                </p>
            @endforelse
        </div>

    </div>
</x-app-layout>
