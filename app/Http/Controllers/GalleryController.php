<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $galeri = Gallery::all();
        $active = 'galeri';
        return view('galeri', compact('active', 'galeri'));
    }

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

    //display cms
    public function show(Gallery $gallery)
    {
        $galeri = Gallery::all();
        $active = 'galeri';
        return view('admin.galericms', compact('galeri', 'active'));
    }
    public function update(Request $request, Gallery $gallery, $id)
    {
        $request->validate([
            'nama' => 'required',
            'gambar' => 'nullable|image',
            'text' => 'required',
        ]);

        // dd($request->all());

        $gallery = Gallery::find($id);

        if ($image = $request->file('gambar')) {
            $desiredFileName = $request->input('nama');
            $imageName = $desiredFileName . now()->format('d-m-y') . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('images/galeri');

            if ($gallery->image && file_exists(public_path('images/galeri/' . $gallery->image))) {
                unlink(public_path('images/' . $gallery->image));
            }
            $image->move($destinationPath, $imageName);

            $gallery->gambar = $imageName;
        }

        $gallery->nama = $request->input('nama');
        $gallery->text = $request->input('text');
        $gallery->active = $request->input('active');
        $gallery->save();
        return redirect('/galericms');
    }
    public function destroy(Gallery $gallery, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // Delete the image file from storage
        $imagePath = public_path('images/galeri') . '/' . $gallery->gambar;
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $gallery->delete();

        return redirect('/galericms');
    }
}
