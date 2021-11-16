<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Customer extends Model
{
    use HasFactory, Sortable, SoftDeletes;

    protected $table = 'customers';

    protected $fillable = [
        'mail',
        'name',
        'address',
        'phone',
    ];

    // Table on index page can be sorted based on each of the specified fields.
    public $sortable = [
        'id',
        'mail',
        'name',
        'address',
        'phone',
    ];

    public function shoppingBaskets(){
        return $this->hasMany(Shoppingbasket::class);
    }
}
