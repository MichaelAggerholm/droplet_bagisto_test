<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search input on customers.index view
        $searchTerm = $request->input('searchCustomers');

        // Returns view with search filtering + sort to table with pagination.
        return view('customers.index', ['customers' => Customer::when($searchTerm, function($query) use ($searchTerm){
            $query->where('mail', 'LIKE', '%' . $searchTerm . '%');
            $query->orWhere('name', 'LIKE', '%' . $searchTerm . '%');
            $query->orwhere('address', 'LIKE', '%' . $searchTerm . '%');
            $query->orWhere('phone', $searchTerm);
        })->sortable()->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Saves customer from create view.

        $request->validate([
            'mail' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            Customer::create($request->all());

            return redirect()->route('customers.index')
                ->with('success','Kunde oprettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact(['customer']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact(['customer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        // Updates customer from edit view.

        $request->validate([
            'mail' => 'required|string|max:50',
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            $customer->update($request->all());

            return redirect()->route('customers.index')
                ->with('success','Kunde opdateret!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        // Deletes a specific customer, then returns with success message.
        // Softdeletes only since specified in model.

        try {
            $customer->delete();

            return redirect()->route('customers.index')
                ->with('success','Kunde slettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}
