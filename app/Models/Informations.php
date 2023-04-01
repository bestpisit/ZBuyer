<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informations extends Model
{
    use HasFactory;
    protected $table = "informations";
    protected $fillable = [
        'address',
        'phone_number',
        'user_id',
        'current_order_id'
    ];
    public function users()
    { 
        return $this->belongsTo(User::class); 
    }
}
