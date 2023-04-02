<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";
    protected $fillable = [
        'user_id',
        'description',
        'purchased'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}