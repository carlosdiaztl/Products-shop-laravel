<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'customer_id'
    ];
    public function payment(){
        //tiene un pago
        return $this->hasOne(Payment::class);
    }
    public function user(){
        //pertenece a un usuario
        return $this->belongsTo(User::class, 'customer_id');
    }
    public function products(){
        //pertenece a muchos productos 
        return $this ->BelongsToMany(Product::class)->withPivot('quantity');
    }

}
