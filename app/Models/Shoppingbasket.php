<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoppingbasket extends Model
{
    use HasFactory;

    public function customer(){
        return $this->hasOne('App\Models\Customer');
    }

    public function Book()
    {
        return $this->belongsToMany(Book::class);
    }
}
