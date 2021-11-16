<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search input on warehouses.index view
        $searchTerm = $request->input('searchWarehouses');

        // Returns view with search filtering + sort to table with pagination.
        return view('warehouses.index', ['warehouses' => Warehouse::when($searchTerm, function($query) use ($searchTerm){
            $query->where('name', 'LIKE', '%' . $searchTerm . '%');
            $query->orwhere('address', 'LIKE', '%' . $searchTerm . '%');
            $query->orWhere('phone', $searchTerm);
            $query->orWhere('url', 'LIKE', '%' . $searchTerm . '%');
        })->sortable()->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Saves warehouse from create view.

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            Warehouse::create($request->all());

            return redirect()->route('warehouses.index')
                ->with('success','Varehus oprettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function show(Warehouse $warehouse)
    {
        return view('warehouses.show', compact(['warehouse']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function edit(Warehouse $warehouse)
    {
        return view('warehouses.edit', compact(['warehouse']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        // Updates warehouse from edit view.

        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);

        try {
            $warehouse->update($request->all());

            return redirect()->route('warehouses.index')
                ->with('success','Varehus opdateret!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Warehouse $warehouse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warehouse $warehouse)
    {
        // Deletes a specific warehouse, then returns with success message.
        // Softdeletes only since specified in model.

        try {
            $warehouse->delete();

            return redirect()->route('warehouses.index')
                ->with('success','Varehus slettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}

