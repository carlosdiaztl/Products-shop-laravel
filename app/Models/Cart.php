<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Cart extends Model
{
    use HasFactory;
    public function products()
    {
        //pertenece a muchos productos 
        return $this->morphToMany(Product::class, 'productable')->withPivot('quantity');
    }
    public function getTotalAttribute()
    {
        return   $this->products->pluck('total')->sum();
        // aqui accedemos al total de todos los productos y los sumamos en el carito total 

    }
}
