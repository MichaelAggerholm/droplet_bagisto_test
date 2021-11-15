<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shoppingbasket extends Model
{
    use HasFactory, SoftDeletes;

//    protected $table = 'shoppingbaskets';

    public function customers(){
        return $this->hasOne('App\Models\Customer');
    }

    public function Books()
    {
        return $this->belongsToMany(Book::class);
    }
}
