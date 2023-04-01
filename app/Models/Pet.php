<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = "pets";
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id'
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function likedUser()
    { 
        return $this->belongsToMany(User::class,'wish_lists'); 
    }
}
