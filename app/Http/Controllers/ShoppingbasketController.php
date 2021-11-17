<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shoppingbasket;
use Illuminate\Http\Request;

class ShoppingbasketController extends Controller
{
    // https://github.com/Crinsane/LaravelShoppingcart
    // https://larainfo.com/blogs/laravel-8-add-to-cart-step-by-step-example <- Burde forsøges
    // https://www.itsolutionstuff.com/post/laravel-shopping-add-to-cart-with-ajax-exampleexample.html
    // https://github.com/hardevine/LaravelShoppingcart <- jeg tror dette er bedste library for laravel 8.
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $shoppingbasket = new Shoppingbasket;
//        $shoppingbasket->customer_id = 1;
//
//        $shoppingbasket->save();
//
//        $book = Book::find(1);
//        $shoppingbasket->books()->attach($book);

        return 'Success';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
