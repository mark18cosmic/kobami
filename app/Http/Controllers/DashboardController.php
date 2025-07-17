<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

    if ($user->role === 'vendor') {
        $productCount = Product::where('vendor_id', $user->id)->count();
        $products = Product::where('vendor_id', $user->id)
                           ->latest()
                           ->take(6)
                           ->get(); // get last 6 products

        return view('vendor.dashboard', [
            'productCount' => $productCount,
            'products' => $products,
        ]);
    }

    return redirect()->route('home');
    }
}
    