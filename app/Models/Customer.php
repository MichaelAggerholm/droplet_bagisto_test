<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'name', 'address', 'phone',
    ];

    public function shoppingBaskets(){
        return $this->hasOne('App\Models\Shoppingbasket');
    }
}
