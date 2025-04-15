<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $films = Film::all();
        return view('films.index',compact('films'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('films.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $data = $request->validate([
            'title'=> 'required|string|max:255',
            'description'=> 'nullable|string',
            'year' => 'nullable|string|max:4',
            'embed_url' => 'nullable|string',
        ]);

        Film::create($data);

        return redirect()->route('films.index')->with('success','Film created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Film $film)
    {
        $film->load('comments.user');
        return view('films.show', compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Film $film)
    {
        return view('films.edit', compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Film $film)
    {
        $data = $request -> validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'year' => 'nullable|string|max:4',
            'embed_url' => 'nullable|string',

        ]);

        $film->update($data);

        return redirect()->route('films.index')->with('success','Film updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Film $film)
    {
        $film -> delete();
        return redirect()->route('films.index')->with('success','Film deleted successfully');
    }
}
