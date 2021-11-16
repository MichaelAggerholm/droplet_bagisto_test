<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, Sortable, SoftDeletes;

    protected $table = 'books';

    // These fields can be filled when creating and updating.
    protected $fillable = [
        'ISBN',
        'publisher_id',
        'author_id',
        'year',
        'title',
        'price',
    ];

    // Table on index page can be sorted based on each of the specified fields.
    public $sortable = [
        'id',
        'ISBN',
        'publisher_id',
        'author_id',
        'year',
        'title',
        'price',
    ];

    // Book belongs to an author.
    public function author()
    {
        return $this->belongsTo(Author::class);
    }

    // Book belongs to a publisher.
    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }

    // Book can belong to multiple warehouses.
    public function warehouses()
    {
        return $this->belongsToMany(Warehouse::class);
    }

    // Book can belong to multiple shoppingBaskets. (This means ofc a copy of the original book copy thats being sold)
    public function shoppingBasket()
    {
        return $this->belongsToMany(Shoppingbasket::class);
    }

    // TODO: When soft deleting a book, should the many-to-many relational data to warehouses be deleted too?
    // TODO: Or should it be saved in case the book someday gets "undeleted", or for keeping history of the data.?
}
