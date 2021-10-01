<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'number', 'city', 'image', 'id_user'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function client()
    {
        return $this->hasMany(Order::class, 'id_client');
    }

    public function product_wishlist()
    {
        return $this->hasMany(ProductWishlist::class, 'id_client');
    }

    public function vendor_wishlist()
    {
        return $this->hasMany(VendorWishlist::class, 'id_client');
    }
}
