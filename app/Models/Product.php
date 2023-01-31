<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];
    public function carts(){
        //pertenece a muchos productos 
        // relacion polimorfica de muchos a muchos 
        return $this->morphedByMany(Cart::class,'productable')->withPivot('quantity');
    }
    public function orders(){
        //pertenece a muchos productos 
        return $this->morphedByMany(Order::class,'productable')->withPivot('quantity');
    }
    public function images(){
        return $this ->MorphMany(Image::class,'imageable');
    }
    public function scopeAvailable($query){
        $query->where('status', 'available');
    }
}
