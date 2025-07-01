<x-app-layout>
<div class='p-6'>
    <div class="p-6 max-w-xl mx-auto bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Add Product</h2>
        
        <form method="POST" action="{{ route('vendor.products.store') }}" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Product Name -->
            <div>
                <label for="name" class="block mb-1 font-semibold text-gray-700">Product Name <span class="text-red-500">*</span></label>
                <input
                    id="name"
                    name="name"
                    type="text"
                    required
                    placeholder="Enter product name"
                    class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('name') }}"
                />
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block mb-1 font-semibold text-gray-700">Description</label>
                <textarea
                    id="description"
                    name="description"
                    rows="4"
                    placeholder="Enter product description"
                    class="w-full rounded border border-gray-300 px-4 py-2 resize-none focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Price -->
            <div>
                <label for="price" class="block mb-1 font-semibold text-gray-700">Price (MVR) <span class="text-red-500">*</span></label>
                <input
                    id="price"
                    name="price"
                    type="number"
                    step="0.01"
                    required
                    placeholder="Enter product price"
                    class="w-full rounded border border-gray-300 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    value="{{ old('price') }}"
                />
                @error('price')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image -->
            <div>
                <label for="image" class="block mb-1 font-semibold text-gray-700">Product Image</label>
                <input
                    id="image"
                    name="image"
                    type="file"
                    accept="image/*"
                    class="w-full rounded border border-gray-300 px-3 py-2 cursor-pointer focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                />
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Button -->
            <div>
                <button
                    type="submit"
                    class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-3 rounded shadow transition duration-200"
                >
                    Save Product
                </button>
            </div>
        </form>
    </div>
    </div>
</x-app-layout>
