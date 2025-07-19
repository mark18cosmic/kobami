<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id)
    {
        $vendor = User::where('id', $id)->where('role', 'vendor')->firstOrFail();

        $products = $vendor->products()->latest()->paginate(12); // add relationship if not defined

        return view('vendors.show', compact('vendor', 'products'));
    }
}
