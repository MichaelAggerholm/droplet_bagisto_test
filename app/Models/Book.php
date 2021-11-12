<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'ISBN', 'publisher_name', 'author_name', 'year', 'title', 'price',
    ];

    public function Author(){
        return $this->belongsTo(Author::class);
    }

    public function Publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function Warehouse()
    {
        return $this->belongsToMany(Warehouse::class);
    }

    public function shoppingBasket()
    {
        return $this->belongsToMany(ShoppingBasket::class);
    }
}
