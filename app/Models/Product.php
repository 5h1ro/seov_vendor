<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'id_vendor', 'price', 'package', 'package_item', 'detail', 'location', 'sold', 'rating', 'image'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'id_vendor');
    }

    public function order()
    {
        return $this->hasMany(Order::class, 'id_product');
    }

    public function product_wishlist()
    {
        return $this->hasMany(ProductWishlist::class, 'id_product');
    }
}
