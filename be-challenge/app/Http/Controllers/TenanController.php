<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenan;

class TenanController extends Controller
{
    public function index()
    {
        $tenans = Tenan::all();
        return response()->json(['tenans' => $tenans], 200);
    }
}
