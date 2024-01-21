<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active = 'galeri';
        return view('galeri', compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'required|image',
            'text' => 'required',
            'active' => 'boolean',
        ]);



        $input = $request->all();

        if ($image = $request->file('gambar')) {
            $desiredFileName = $request->input('nama');
            $imageName = $desiredFileName . now()->format('d-m-y') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/galeri');
            $image->move($destinationPath, $imageName);
            $input['gambar'] = $imageName;
        }

        $input['active'] = 0;
        Gallery::create($input);
        return redirect('/galericms');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        $galeri = Gallery::all();
        $active = 'galeri';
        return view('admin.galericms', compact('galeri', 'active'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
    }
}
