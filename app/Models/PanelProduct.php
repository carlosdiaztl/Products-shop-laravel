<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PanelProduct extends Product
{
    use HasFactory;
    protected static function booted(): void
    {
        // static::addGlobalScope(new AvailableScope);
    }
}
