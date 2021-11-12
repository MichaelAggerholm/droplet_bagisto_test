<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'ISBN', 'publisher_id', 'author_id', 'year', 'title', 'price',
    ];

    public function authors(){
        return $this->belongsTo(Author::class);
    }

    public function publishers(){
        return $this->belongsTo(Publisher::class);
    }

    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class);
    }

    public function shoppingBaskets()
    {
        return $this->belongsToMany(Shoppingbasket::class);
    }
}
