<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    protected $primaryKey = 'KodeKasir';

    protected $fillable = ['Nama', 'HP'];

    public function notas()
    {
        return $this->hasMany(Nota::class, 'KodeKasir', 'KodeKasir');
    }
}
