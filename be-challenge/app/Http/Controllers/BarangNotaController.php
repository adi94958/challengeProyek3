<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BarangNota;

class BarangNotaController extends Controller
{
    public function index()
    {
        $barangNotas = BarangNota::all();
        return response()->json(['barangNotas' => $barangNotas], 200);
    }

    public function show($id)
    {
        $barangNota = BarangNota::find($id);

        if (!$barangNota) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        return response()->json(['barangNota' => $barangNota], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'KodeNota' => 'required',
            'KodeBarang' => 'required',
            'JumlahBarang' => 'required|integer',
            'HargaSatuan' => 'required|numeric',
            'Jumlah' => 'required|numeric',
        ]);

        $barangNota = BarangNota::create($request->all());

        return response()->json(['barangNota' => $barangNota], 201);
    }

    public function update(Request $request, $id)
    {
        $barangNota = BarangNota::find($id);

        if (!$barangNota) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        $this->validate($request, [
            'KodeNota' => 'required',
            'KodeBarang' => 'required',
            'JumlahBarang' => 'required|integer',
            'HargaSatuan' => 'required|numeric',
            'Jumlah' => 'required|numeric',
        ]);

        $barangNota->update($request->all());

        return response()->json(['barangNota' => $barangNota], 200);
    }

    public function destroy($id)
    {
        $barangNota = BarangNota::find($id);

        if (!$barangNota) {
            return response()->json(['message' => 'BarangNota not found'], 404);
        }

        $barangNota->delete();

        return response()->json(['message' => 'BarangNota deleted'], 200);
    }
}
