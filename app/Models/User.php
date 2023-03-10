<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        // 'admin_since',
    ];
    //este admin since debe ser retirado en produccion 

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = [
        'admin_since',

    ];
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
    public function payments()
    {
        //recibe hacia donde queremos llegar y traves de quien luego la clave fronea
        return $this->hasManyThrough(Payment::class, Order::class, 'customer_id');
    }
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    public function  isAdmin()
    {
        return  $this->admin_since != null
            && $this->admin_since->lessThanOrEqualTo(now());
        // una funcion para saber si es igual o menor a la fecha actual 

    }
}
