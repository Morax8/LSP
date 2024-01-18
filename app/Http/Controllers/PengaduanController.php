<?php

namespace App\Http\Controllers;

use App\Models\pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tujuan_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'telpon' => 'required',
            'alamat' => 'required',
            'tanggal' => 'required',
            'isi' => 'required',
            'active' => 'boolean',
        ]);

        $data = $request->all();
        $data['active'] = 0;

        pengaduan::create($data);
        return redirect('/histori');
    }

    public function update(Request $request, pengaduan $pengaduan)
    {
        $request->validate([
            'active' => 'boolean',
        ]);

        $pengaduan->update(['active' => $request->input('active')]);

        return redirect('/histori');
    }


    /**
     * Display the specified resource.
     */
    public function show(pengaduan $pengaduan, Request $request)
    {
        $search = $request->input('search');

        $pengaduan = Pengaduan::when($search, function ($query) use ($search) {
            return $query->where('id', $search);
        })->latest()->get();

        return view('histori', compact('pengaduan'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function showCMS(pengaduan $pengaduan, Request $request)
    {
        $search = $request->input('search');

        $pengaduan = Pengaduan::when($search, function ($query) use ($search) {
            return $query->where('id', $search);
        })->latest()->get();

        $active = 'table';

        return view('admin.pengaduan', compact('pengaduan', 'active'));
    }

    public function Dashboard(pengaduan $pengaduan, Request $request)
    {
        $search = $request->input('search');

        $pengaduan = Pengaduan::when($search, function ($query) use ($search) {
            return $query->where('id', $search);
        })->latest()->get();
        $active = 'dashboard';
        return view('admin.dashboard', compact('pengaduan', 'active'));
    }

    public function reply(Request $request, $pengaduanId)
    {
        // Validate the request data as needed
        $request->validate([
            'isi' => 'required',
        ]);

        $pengaduan = Pengaduan::findOrFail($pengaduanId);

        // Create a reply
        $tanggapan = new Tanggapan([
            'isi' => $request->input('isi'),
        ]);

        $pengaduan->tanggapan()->save($tanggapan);

        // Update the status to 1
        $pengaduan->update(['active' => 1]);

        return redirect('/pengaduan');
    }

    public function showTanggapan(Tanggapan $tanggapan)
    {
        $tanggapan = Tanggapan::all();
        $active = 'tanggapan';
        return view('admin.tanggapan', compact('tanggapan', 'active'));
    }

    public function tanggapanDestroy($id)
    {
        Tanggapan::findorFail($id)->delete();
        return redirect('/tanggapan');;
    }


    public function destroy($id)
    {
        pengaduan::findorfail($id)->delete();
        return redirect('/pengaduan');
    }
}
