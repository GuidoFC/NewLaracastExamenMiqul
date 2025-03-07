<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
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
            'name' => 'required|string|unique:roles|max:255',
        ]);

        // Crear el rol en la base de datos
        $libro = Libro::create([
            'name' => $validated['name']
        ]);

        // Responder con el nuevo rol creado
        return response()->json([
            'status' => 'success',
            'message' => 'Rol creado exitosamente',
            'role' => $libro
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
