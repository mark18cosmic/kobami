<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User; // import User model

class Product extends Model
{
    //
    use HasFactory;

    // Allow mass assignment for these fields
    protected $fillable = [
        'vendor_id',
        'name',
        'description',
        'price',
        'image_path',
    ];
    public function vendor()
{
    return $this->belongsTo(User::class, 'vendor_id');
}

}
