<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Warehouse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('books.index', [
            'books' => DB::table('books')->paginate(15)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create(Request $request)
    public function create()
    {
        return view('books.create');

//        $book = new Book;
//        $book->ISBN = 'ISBN12349';
//        $book->publisher_id = 1;
//        $book->author_id = 1;
//        $book->year = 1992;
//        $book->title = 'Worlds first test book';
//        $book->price = 250;
//
//        $book->save();
//
//        $warehouses = Warehouse::find(1);
//        $book->warehouses()->attach($warehouses);
//
//        return 'Success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new book
        $request->validate([
            'ISBN' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'year' => 'required',
            'title' => 'required',
            'price' => 'required',
        ]);

        try {
            Book::create($request->all());

            // Match with a warehouse
            // $warehouses = Warehouse::find(1);
            // $book->warehouses()->attach($warehouses);

            return redirect()->route('books.index')
                ->with('success','Book created successfully.');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        // Show details on a specific book
        return view('books.show',compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        // Edit a specific book
        return view('books.edit',compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        // Update book in the database table
        $request->validate([
            'ISBN' => 'required',
            'publisher_id' => 'required',
            'author_id' => 'required',
            'year' => 'required',
            'title' => 'required',
            'price' => 'required',
        ]);

        $book->update($request->all());

        // Match with a warehouse
        // $warehouses = Warehouse::find(1);
        // $book->warehouses()->attach($warehouses);

        return redirect()->route('books.index')
            ->with('success','Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        // Delete a specific book
        $book->delete();

        return redirect()->route('books.index')
            ->with('success','Book deleted successfully');
    }
}
