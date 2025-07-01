<x-app-layout>
    <div class="p-6 max-w-4xl mx-auto">
        <h1 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name }} 👋</h1>

        <div class="flex flex-col sm:flex-row gap-4">
            <a href="{{ route('vendor.products.create') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded text-center hover:bg-blue-700 transition">
                ➕ Add New Product
            </a>

            <a href="{{ route('vendor.products.index') }}"
               class="bg-gray-800 text-white px-6 py-3 rounded text-center hover:bg-gray-900 transition">
                📦 View Your Products
            </a>
        </div>
    </div>
</x-app-layout>
