<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangNota extends Model
{
    public $timestamps = false; // karena tabel BarangNota tidak memiliki kolom created_at dan updated_at

    protected $fillable = ['KodeNota', 'KodeBarang', 'JumlahBarang', 'HargaSatuan', 'Jumlah'];

    public function nota()
    {
        return $this->belongsTo(Nota::class, 'KodeNota', 'KodeNota');
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'KodeBarang');
    }
}
