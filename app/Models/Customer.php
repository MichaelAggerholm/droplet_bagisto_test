<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'email', 'name', 'address', 'phone',
    ];

    public function shoppingBaskets(){
        return $this->hasOne('App\Models\Shoppingbasket');
    }
}
