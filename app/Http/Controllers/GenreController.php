<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre  = Genre::all();
        return view('pages.views.genre.index', compact('genre'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.views.genre.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            ['name' => 'required|string|max:255'],
            ['name.required' => 'Nama wajib diisi!']);

        Genre::create(["name" => $request->name]);

        return redirect()->route('genre.index')->with('success', 'Genre berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Cari genre berdasarkan ID
        $genre = Genre::findOrFail($id);

         // Ambil semua film yang memiliki genre_id sesuai
         $films = $genre->films;
        return view('pages.views.genre.detail', compact('genre', 'films'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::find($id);
        return view('pages.views.genre.edit', compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            ['name' => 'required|string|max:255'],
            ['name.required' => 'Nama wajib diisi!']
        );

        $cast = Genre::findOrFail($id);
        $cast->update(["name" => $request->name]);

        return redirect()->route('genre.index')->with('success', 'Cast berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();

        return redirect()->route('genre.index')->with('success', 'Genre berhasil dihapus!');
    }
}
