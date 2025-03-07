<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Libro;
use Illuminate\Http\Request;

class AutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Validar los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:25',
        ]);

        // Crear el rol en la base de datos
        $autor = Autors::create([
            'nombre' => $validated['nombre']
        ]);

        // Responder con el nuevo rol creado
        return response()->json([
            'status' => 'success',
            'message' => 'Autor creado exitosamente',
            'role' => $autor
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
