<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Search input on authors.index view
        $searchTerm = $request->input('searchAuthors');

        // Returns view with search filtering + sort to table with pagination.
        return view('authors.index', ['authors' => Author::when($searchTerm, function($query) use ($searchTerm){
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
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Saves author from create view.

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            Author::create($request->all());

            return redirect()->route('authors.index')
                ->with('success','Forfatter oprettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('authors.show', compact(['author']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('authors.edit', compact(['author']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        // Updates author from edit view.

        $request->validate([
            'name' => 'required|string|max:50',
            'address' => 'required|string|max:70',
            'phone' => 'required|numeric|digits:8',
        ]);

        try {
            $author->update($request->all());

            return redirect()->route('authors.index')
                ->with('success','Forfatter opdateret!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        // Deletes a specific author, then returns with success message.
        // Softdeletes only since specified in model.

        try {
            $author->delete();

            return redirect()->route('authors.index')
                ->with('success','Forfatter slettet!');

        } catch (\Illuminate\Database\QueryException $e) {
            var_dump($e->errorInfo);
        }
    }
}
