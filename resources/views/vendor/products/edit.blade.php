<x-app-layout>
    <div class='p-6'>
    <div class="p-6 max-w-xl mx-auto bg-white rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

        <form method="POST" action="{{ route('vendor.products.update', $product) }}" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Product Name -->
            <div>
                <label for="name" class="block font-semibold mb-1">Product Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $product->name) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block font-semibold mb-1">Description</label>
                <textarea id="description" name="description" rows="4"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block font-semibold mb-1">Price (MVR)</label>
                <input id="price" name="price" type="number" step="0.01" min="0" value="{{ old('price', $product->price) }}" required
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Current Image Preview -->
            @if ($product->image_path)
                <div>
                    <label class="block font-semibold mb-1">Current Image</label>
                    <img src="{{ asset('storage/' . $product->image_path) }}" alt="Current Image" class="h-40 w-full object-cover rounded mb-2">
                </div>
            @endif

            <!-- New Image Upload -->
            <div>
                <label for="image" class="block font-semibold mb-1">Change Image</label>
                <input id="image" name="image" type="file"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" class="bg-[#022954] hover:bg-[#011e3f] text-white 
rounded-xl font-semibold font-sans 
h-12 sm:h-14 px-4 sm:px-6 text-base sm:text-lg 
flex items-center justify-center 
shadow-md hover:shadow-xl transition-all duration-200 
focus:outline-none focus:ring-4 focus:ring-[#022954]/40 w-full
">
                    Update Product
                </button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
