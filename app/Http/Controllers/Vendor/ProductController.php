<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;



class ProductController extends Controller
{
    //

    use AuthorizesRequests;

    public function index()
{
    $products = auth()->user()->products()->latest()->get();
    return view('vendor.products.index', compact('products'));
}

public function create()
{
    return view('vendor.products.create');
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    $path = $request->file('image')?->store('products', 'public');

    Product::create([
        'vendor_id' => auth()->id(),
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image_path' => $path,
    ]);

    return redirect()->route('vendor.products.index');
}
public function edit(Product $product)
{
    $this->authorize('update', $product);
    return view('vendor.products.edit', compact('product'));
}
public function update(Request $request, Product $product)
{
    $this->authorize('update', $product);

    $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|max:2048',
    ]);

    $path = $request->file('image')?->store('products', 'public');

    $product->update([
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'image_path' => $path ?? $product->image_path,
    ]);

    return redirect()->route('vendor.products.index')->with('success', 'Product updated!');
}
public function destroy(Product $product)
{
    $this->authorize('delete', $product);
    $product->delete();
    return back()->with('success', 'Product deleted!');
}

}
