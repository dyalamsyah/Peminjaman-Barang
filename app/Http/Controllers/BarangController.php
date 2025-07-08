<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Barang::all();
        $title = 'Delete Barang!';
        $text = "Apakah Kamu Yakin Akan Menghapus Data Ini?";
        confirmDelete($title, $text);
        return view('admin.barang.view_barang', compact('data'));
    }
    public function userIndex()
    {
        $data = Barang::all();
        return view('user.barang', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barang.add_barang');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $data = new Barang();
    $data->namaBarang = $request->namaBarang;
    $data->jumlahBarang = $request->jumlahBarang;
    $data->merek = $request->merek;
    $data->hargasewa = $request->hargasewa;
    
    if ($request->hasFile('fotobarang')) {
        $file = $request->file('fotobarang');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/fotobarang'), $filename);
        $data->fotobarang = 'images/fotobarang/' . $filename;
    }
    
    $data->deskripsiBarang = $request->deskripsiBarang;
    $data->save();
    return redirect()->route('barang.view')->with('success', 'Tambah data Berhasil!');
}


    /**
     * Display the specified resource.
     */
    // public function userShow(string $id)
    // {
    //     $data = Barang::find($id);
    //     return view('user.detailBarang',compact('data'));
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editData = Barang::Find($id);
        return view('admin.barang.edit_barang', compact('editData'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $data = Barang::find($id);
    $data->namaBarang = $request->namaBarang;
    $data->jumlahBarang = $request->jumlahBarang;
    $data->merek = $request->merek;
    $data->hargasewa = $request->hargasewa;
    
    if ($request->hasFile('fotobarang')) {
        // Hapus foto lama
        if ($data->fotobarang && file_exists(public_path($data->fotobarang))) {
            unlink(public_path($data->fotobarang));
        }
        
        $file = $request->file('fotobarang');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/fotobarang'), $filename);
        $data->fotobarang = 'images/fotobarang/' . $filename;
    }
    
    $data->deskripsiBarang = $request->deskripsiBarang;
    $data->update();
    return redirect()->route('barang.view')->with('Success', 'Update Barang berhasil');
}
    public function userShow(string $id)
    {
        $data = Barang::find($id);
        return view('user.detailbarang', compact('data'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $data = Barang::find($id);
    // Perbaiki kondisi pengecekan file
    if ($data->fotobarang && $data->fotobarang != '') {
        Storage::disk('public')->delete($data->fotobarang); // Tambahkan disk('public')
    }
    $data->delete();
    return redirect()->route('barang.view');
    }
}
