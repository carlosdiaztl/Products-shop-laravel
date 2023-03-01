<?php

namespace App\Models;

use App\Scopes\AvailableScope;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $with = ['images'];

    protected $fillable = [
        'title',
        'description',
        'price',
        'stock',
        'status',
    ];
    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::addGlobalScope(new AvailableScope);
    }
    public function carts()
    {
        //pertenece a muchos productos 
        // relacion polimorfica de muchos a muchos 
        return $this->morphedByMany(Cart::class, 'productable')->withPivot('quantity');
    }
    public function orders()
    {
        //pertenece a muchos productos 
        return $this->morphedByMany(Order::class, 'productable')->withPivot('quantity');
    }
    public function images()
    {
        return $this->MorphMany(Image::class, 'imageable');
    }
    public function scopeAvailable($query)
    {
        $query->where('status', 'available');
    }
    public function getTotalAttribute()
    {
        return   $this->pivot->quantity * $this->price;
        //  return   $product->pivot->quantity * $product->price;
        // retorna asi ya que estamos dentro de esta clase

    }
    public function getQuantityAttribute()
    {
        return   $this->pivot->quantity;
        //  return   $product->pivot->quantity * $product->price;
        // retorna asi ya que estamos dentro de esta clase

    }
}
