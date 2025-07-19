<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::with('vendor') // assuming vendor is a relation
                        ->latest()
                        ->paginate(12);

        return view('home', compact('products'));
    }
}
