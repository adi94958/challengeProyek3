<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;

class NotaController extends Controller
{
    public function index()
    {
        $notas = Nota::all();
        return response()->json(['notas' => $notas], 200);
    }

    public function show($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        return response()->json(['nota' => $nota], 200);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'KodeTenan' => 'required',
            'KodeKasir' => 'required',
            'TglNota' => 'required|date',
            'JamNota' => 'required|date_format:H:i:s',
            'JumlahBelanja' => 'required|numeric',
            'Diskon' => 'required|numeric',
            'Total' => 'required|numeric',
        ]);

        $nota = Nota::create($request->all());

        return response()->json(['nota' => $nota], 201);
    }

    public function update(Request $request, $id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        $this->validate($request, [
            'KodeTenan' => 'required',
            'KodeKasir' => 'required',
            'TglNota' => 'required|date',
            'JamNota' => 'required|date_format:H:i:s',
            'JumlahBelanja' => 'required|numeric',
            'Diskon' => 'required|numeric',
            'Total' => 'required|numeric',
        ]);

        $nota->update($request->all());

        return response()->json(['nota' => $nota], 200);
    }

    public function destroy($id)
    {
        $nota = Nota::find($id);

        if (!$nota) {
            return response()->json(['message' => 'Nota not found'], 404);
        }

        $nota->delete();

        return response()->json(['message' => 'Nota deleted'], 200);
    }
}
