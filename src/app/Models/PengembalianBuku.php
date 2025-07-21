<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PengembalianBuku extends Model
{
    use HasFactory;

    protected $fillable = [
        'peminjaman_buku_id',
        'tanggal_pengembalian',
        'keterangan',
    ];

    public function peminjamanBuku()
    {
        return $this->belongsTo(PeminjamanBuku::class);
    }
}
