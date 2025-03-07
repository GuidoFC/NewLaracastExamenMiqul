<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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


        try {

            $validated =  $request->validate([
                'titulo' => 'required|string|unique:libros|max:25|min:3',

            ], [
                'titulo.require' => 'El titulo es oblogatorio',
                'titulo.min' => 'El titulo debe tener min 3 caraceteres',
                'titulo.unique' => 'El titulo debe de ser único',
                'titulo.max' => 'El titulo debe tener como max 25 caraceteres',
            ]);


            $libro = Libro::create([
                'titulo' => $validated['titulo']
            ]);

            // Responder con el nuevo rol creado
            return response()->json([
                'status' => 'success',
                'message' => 'Libro creado exitosamente',
                'Libro' => $libro
            ], 201);


        } catch (ValidationException $e) {
            // Capturar error de validación y devolverlo en JSON
            return response()->json([
                'status' => 'error',
                'message' => 'Errores de validación',
                'errors' => $e->errors(),
            ], 422);
        }

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
