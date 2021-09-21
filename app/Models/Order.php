<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_client', 'id_product', 'amount', 'total', 'event_date', 'status'
    ];

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class, 'id_client');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'id_product');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'id_order');
    }
}
