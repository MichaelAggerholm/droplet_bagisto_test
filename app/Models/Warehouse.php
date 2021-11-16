<?php

namespace App\Models;

use Dyrynda\Database\Support\CascadeSoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Warehouse extends Model
{
    use HasFactory, Sortable, SoftDeletes, CascadeSoftDeletes;

    protected $table = 'warehouses';

    protected $fillable = [
        'name',
        'address',
        'phone',
        'url',
    ];

    // Table on index page can be sorted based on each of the specified fields.
    public $sortable = [
        'name',
        'address',
        'phone',
        'url',
    ];

    public function books()
    {
        return $this->belongsToMany(Book::class);
    }
}
