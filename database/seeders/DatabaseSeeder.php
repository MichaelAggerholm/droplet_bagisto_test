<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Customer;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Shoppingbasket;
use App\Models\Warehouse;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Warehouse::factory()->count(15)->create();
        // Shoppingbasket auto creates Customers on creation.
        Shoppingbasket::factory()->count(15)->create();
        // Book auto creates Publishers and Authors on creation.
        Book::factory()->count(15)->create();

        // Many-to-Many factory, randomly combines books with warehouses
        $books = Book::all();
        Warehouse::all()->each(function ($warehouse) use ($books) {
            $warehouse->books()->attach(
                $books->random(10)->pluck('id')->toArray()
            );
        });

        // Many-to-Many factory, randomly combines books with shoppingbaskets
        $books = Book::all();
        Shoppingbasket::all()->each(function ($shoppingbasket) use ($books) {
            $shoppingbasket->books()->attach(
                $books->random(10)->pluck('id')->toArray()
            );
        });
    }
}
