<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory, SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shipping()
    {
        return $this->belongsTo(ShoppingMethod::class);
    }

    public function payment()
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function products()
    {
        return $this->belongsTo(Product::class)->withPivot('amount');
    }

}