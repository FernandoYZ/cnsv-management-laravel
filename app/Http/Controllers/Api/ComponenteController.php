<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Componente;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ComponenteController extends Controller
{
    // Validación de datos de Componentes
    private function ValidarComponente(Request $request) {
        return $request->validate([
            'nombre' => 'required|string|max:100',
            'tipo' => 'required|string|max:50',
            'text' => 'nullable|string',
        ]);
    }

    // Listas todos los componentes
    public function index() {
        $componentes = Componente::all();
        if ($componentes->isEmpty()) {
            return response()->json([
                'mensaje' => 'No hay componentes registrados'
            ], 200);
        }
        return response()->json($componentes, 200);
    }

    public function show(string $id) {
        try {
            $componente = Componente::findOrFail($id);
            return response()->json($componente);
        } catch (ModelNotFoundException $e) {
            return response()->json(['mensaje' => 'No se han encontrado datos'], 400);
        }
    }

    public function store(Request $request) {
        $componente = Componente::create($this->ValidarComponente($request));
        return response()->json($componente, 201);
    }

    public function update(Request $request, string $id) {
        $componente = Componente::findOrFail($id);
        $componente->update($this->ValidarComponente($request));
        return response()->json($componente, 201);
    }

    public function destroy(string $id) {
        $componente = Componente::findOrFail($id);
        $componente->delete();
        return response()->json(['mensaje' => 'Componente eliminado con éxito'], 200);
    }
}
