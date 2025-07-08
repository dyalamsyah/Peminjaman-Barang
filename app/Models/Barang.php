<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    
    protected $table = 'barang';
    protected $primaryKey = 'id';
    public $timestamps = true;
    
    // Tambahkan fillable untuk mass assignment
    protected $fillable = [
        'namaBarang',
        'jumlahBarang', 
        'merek',
        'hargasewa',
        'fotobarang',
        'deskripsiBarang'
    ];

    // Helper function untuk URL gambar
    public function getFotoUrlAttribute()
    {
        if ($this->fotobarang && file_exists(public_path('images/barang/' . $this->fotobarang))) {
            return asset('images/barang/' . $this->fotobarang);
        }
        return asset('images/no-image.png');
    }
}