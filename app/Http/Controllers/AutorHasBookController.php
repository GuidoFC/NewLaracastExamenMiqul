<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Libro;
use Illuminate\Http\Request;

class AutorHasBookController extends Controller
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
    public function store(Request $request, $id, $autor_id)
    {

        // primero recuperar el autor
        $autor = Autors::find($autor_id);

        if (!$autor) {
            return response()->json([
                'status' => 'error',
                'message' => 'No existe este autor en la base de datos'
            ], 404);
        }

        // recuperar el libro
        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'status' => 'error',
                'message' => 'No existe este libro en la base de datos'
            ], 404);
        }




        return response()->json([
            'status' => 'success',
            'autor' => $autor,
            'libro' => $libro
        ]);
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
