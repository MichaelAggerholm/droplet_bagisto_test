<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Shoppingbasket;
use Illuminate\Http\Request;

class ShoppingbasketController extends Controller
{
    // https://therealprogrammer.com/how-to-make-laravel-8-shopping-cart/

    public function basketList()
    {
        $basketItems = ShoppingBasket::getContent();
        // dd($basketItems);
        return view('basket', compact('basketItems'));
    }


    public function addToBasket(Request $request)
    {
        ShoppingBasket::add([
            /*'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
            'image' => $request->image,
            )*/
        ]);
        session()->flash('success', 'Product is Added to basket Successfully !');

        return redirect()->route('basket.list');
    }

    public function updateBasket(Request $request)
    {
        Shoppingbasket::update(
            /*$request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]*/
        );

        session()->flash('success', 'Basket is Updated Successfully !');

        return redirect()->route('basket.list');
    }

    public function removeBasket(Request $request)
    {
        Shoppingbasket::remove($request->id);
        session()->flash('success', 'Basket Remove Successfully !');

        return redirect()->route('basket.list');
    }

    public function clearAllCart()
    {
        Shoppingbasket::clear();

        session()->flash('success', 'All Item basket Clear Successfully !');

        return redirect()->route('basket.list');
    }
}
