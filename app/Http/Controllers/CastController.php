<?php

namespace App\Http\Controllers;

use App\Models\Cast;
use Illuminate\Http\Request;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cast = Cast::all();
        return view('pages.views.cast.index', compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.views.cast.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'bio' => 'required|string'
        ],
        [
            'name.required' => 'Nama wajib diisi!',
            'age.required' => 'Umur wajib diisi!',
            'age.integer' => 'Umur harus berupa angka!',
            'bio.required' => 'Bio wajib diisi!',
        ]);

        Cast::create([
            "name" => $request->name,
            "age" => $request->age,
            "bio" => $request->bio,
        ]);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $cast = Cast::find($id);
        return view('pages.views.cast.detail', compact('cast'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cast = Cast::find($id);
        return view('pages.views.cast.edit', compact('cast'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'bio' => 'required|string'
        ],
        [
            'name.required' => 'Nama wajib diisi!',
            'age.required' => 'Umur wajib diisi!',
            'age.integer' => 'Umur harus berupa angka!',
            'bio.required' => 'Bio wajib diisi!',
        ]);

        $cast = Cast::findOrFail($id);

        $cast->update([
            "name" => $request->name,
            "age" => $request->age,
            "bio" => $request->bio,
        ]);

        return redirect()->route('cast.index')->with('success', 'Cast berhasil diperbaharui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $cast = Cast::findOrFail($id);
        $cast->delete();

        return redirect()->route('cast.index')->with('success', 'Cast berhasil dihapus!');
    }
}
