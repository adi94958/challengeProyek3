<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;

class KasirController extends Controller
{
    public function index()
    {
        $kasirs = Kasir::all();
        return response()->json(['kasirs' => $kasirs], 200);
    }
}
