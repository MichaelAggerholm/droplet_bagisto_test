<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    protected $fillable = [
        'ISBN', 'publisher_id', 'author_id', 'year', 'title', 'price',
    ];

    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    public function warehouse()
    {
        return $this->belongsToMany(Warehouse::class);
    }

    public function shoppingBasket()
    {
        return $this->belongsToMany(Shoppingbasket::class);
    }
}
