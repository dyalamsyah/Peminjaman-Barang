<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $data = Sewa::with('user','barang')->where('id_user',$user)->get();
        $title = 'Batalkan Transaksi?';
        $text = "Apakah Kamu Yakin Akan Membatalkan Transaksi Ini?";
        confirmDelete($title, $text);
        return view('user.transaksi', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeTransaksi(Request $request)
{
    $request->validate([
        'id_sewa' => 'required|exists:sewa,id',
        'fototransaksi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $data = new Transaksi();
    $data->id_sewa = $request->id_sewa;

    if ($request->hasFile('fototransaksi')) {
        // WAJIB tambahkan 'public' di sini agar masuk ke storage/app/public
        $foto_transaksi = $request->file('fototransaksi')->store('fototransaksi', 'public');
        $data->fototransaksi = $foto_transaksi;
    }

    $data->status_transaksi = 0;
    $data->save();

    return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
}


    /**
     * Tampilkan detail pembayaran
     */
    public function showPembayaran(string $id)
    {
        $data = Sewa::with('barang','transaksi')->findOrFail($id);
        return view('user.pembayaran', compact('data'));
    }

    /**
     * Hapus transaksi
     */
    public function destroy(string $id)
    {
        $data = Sewa::find($id);
        if ($data) {
            $data->delete();
        }
        return redirect()->route('user.transaksi');
    }
}
