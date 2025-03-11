<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pagina;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PaginaController extends Controller
{
    // Validación de los datos de la página
    private function validacionPagina(Request $request)
    {
        $data = $request->validate([
            'slug' => 'required|string|max:255|unique:paginas',
            'titulo' => 'required|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'meta_keywords' => 'nullable|string|max:255',
            'meta_imagen' => 'nullable|string',
            'orden' => 'integer',
            // 'tipo' => 'nullable|string|max:50', // No se usará por el momento
            'estado' => 'boolean',
        ]);

        if(empty($data['meta_description'])) {
            $data['meta_description'] = 'El Colegio Nuestra Señora del Valle ofrece educación integral, formación en valores y seminario menor en modalidad de residencia. Descubre nuestra propuesta educativa única.';
        } else if (empty($data['meta_keywords'])) {
            $data['meta_keywords'] = 'educación primaria, educación secundaria, seminario menor, educación religiosa, valores, formación integral, colegio con residencia, colegio internado';
        } else if (empty($data['meta_imagen'])) {
            $data['meta_imagen'] = 'https://cnsv.edu.pe/_astro/frontis.ClnsjFXL_Z2hBNcg.webp';
        }

        return $data;
    }

    // Listar todas las páginas
    public function index()
    {
        $paginas = Pagina::all();

        if ($paginas->isEmpty()) {
            return response()->json(['message' => 'No hay páginas registradas'], 200);
        }

        return response()->json($paginas);
    }

    // Crear una nueva página
    public function store(Request $request)
    {
        $pagina = Pagina::create($this->validacionPagina($request));
        return response()->json($pagina, 201);
    }

    // Mostrar una página
    public function show(string $id)
    {
        try {
            $pagina = Pagina::findOrFail($id);
            return response()->json($pagina);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'message' => 'Página no encontrada'
            ], 404);
        }
    }

    // Actualizar una página
    public function update(Request $request, string $id)
    {
        $pagina = Pagina::findOrFail($id);

        $pagina->update($this->validacionPagina($request));

        return response()->json($pagina, 200);
    }

    // Eliminar una página
    public function destroy(string $id)
    {
        $pagina = Pagina::findOrFail($id);
        $pagina->delete();

        return response()->json(['message' => 'Página eliminada con éxito'], 200);
    }
}
