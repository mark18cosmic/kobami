<?php

namespace App\Policies;

use App\Models\Product;
use App\Models\User;

class ProductPolicy
{
    public function viewAny(User $user): bool
    {
        return true; // Allow listing products
    }

    public function view(User $user, Product $product): bool
    {
        return true; // Allow viewing individual products
    }

    public function create(User $user): bool
    {
        return $user->role === 'vendor'; // Only vendors can create
    }

    public function update(User $user, Product $product): bool
    {
        return $user->id === $product->vendor_id; // Only owner can update
    }

    public function delete(User $user, Product $product): bool
    {
        return $user->id === $product->vendor_id; // Only owner can delete
    }

    public function restore(User $user, Product $product): bool
    {
        return false;
    }

    public function forceDelete(User $user, Product $product): bool
    {
        return false;
    }
}
