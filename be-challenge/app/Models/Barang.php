<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $primaryKey = 'KodeBarang';

    protected $fillable = ['KodeBarang', 'NamaBarang', 'Satuan', 'HargaSatuan', 'Stok'];

    public $incrementing = false;

    public function notaBarang()
    {
        return $this->hasMany(BarangNota::class, 'KodeBarang', 'KodeBarang');
    }
}
