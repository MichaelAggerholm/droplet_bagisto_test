<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search input on publishers.index view
        $searchTerm = $request->input('searchPublishers');

        // Returns view with search filtering + sort to table with pagination.
        return view('publishers.index', ['publishers' => Publisher::when($searchTerm, function($query) use ($searchTerm){
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
        return view('publishers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Saves publisher from create view.

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            Publisher::create($request->all());

            return redirect()->route('publishers.index')
                ->with('success','Forlægger oprettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Publisher $publisher
     * @return \Illuminate\Http\Response
     */
    public function show(Publisher $publisher)
    {
        return view('publishers.show', compact(['publisher']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Publisher $publisher
     * @return \Illuminate\Http\Response
     */
    public function edit(Publisher $publisher)
    {
        return view('publishers.edit', compact(['publisher']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Publisher $publisher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publisher $publisher)
    {
        // Updates publisher from edit view.

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            $publisher->update($request->all());

            return redirect()->route('publishers.index')
                ->with('success','Forlægger opdateret!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Publisher $publisher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publisher $publisher)
    {
        // Deletes a specific publisher, then returns with success message.
        // Softdeletes only since specified in model.

        try {
            $publisher->delete();

            return redirect()->route('publishers.index')
                ->with('success','Forlægger slettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}
