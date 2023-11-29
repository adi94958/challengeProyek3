<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    protected $primaryKey = 'KodeNota';

    protected $fillable = ['KodeTenan', 'KodeKasir', 'TglNota', 'JamNota', 'JumlahBelanja', 'Diskon', 'Total'];

    public function barangNota()
    {
        return $this->hasMany(BarangNota::class, 'KodeNota', 'KodeNota');
    }

    public function tenan()
    {
        return $this->belongsTo(Tenan::class, 'KodeTenan');
    }

    public function kasir()
    {
        return $this->belongsTo(Kasir::class, 'KodeKasir');
    }
}
