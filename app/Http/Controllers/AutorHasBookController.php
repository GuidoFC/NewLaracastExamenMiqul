<?php

namespace App\Http\Controllers;

use App\Models\Autors;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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


        // Asignar el autor al llibre
        $libro->autors()->attach($autor_id);

        return response()->json([
            'status' => 'success',
            'autor' => $autor,
            'libro' => $libro
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function showAllBookFromAutor(string $id)
    {

        $autor = Autors::find($id);

        if (!$autor) {
            return response()->json([
                'status' => 'error',
                'message' => 'No existe este autor en la base de datos'
            ], 404);
        }

        // coger el id del autor


        $id_autor = $autor->id;

        // coger todos los libros del autor
//        $libross =   DB::table('autor_libro')->select('id','autors_id','libro_id')->get();
//        $libross =   DB::table('autor_libro')->select('id','autors_id','libro_id')->where('autors_id', $id_autor);

        $libross = DB::table('autor_libro')
            ->where('autors_id', '=', $id_autor)->get();

//        dd($libross);


        return response()->json([
            'status' => 'success',
            'autor' => $libross
        ]);




    }

    public function showAllAutorFromBook(string $id)
    {

        $libro = Libro::find($id);

        if (!$libro) {
            return response()->json([
                'status' => 'error',
                'message' => 'No existe este libro en la base de datos'
            ], 404);
        }

        // coger el id del autor


        $id_libro = $libro->id;


        $autores = DB::table('autor_libro')
            ->where('autors_id', '=', $id_libro)->get();

//        dd($libross);


        return response()->json([
            'status' => 'success',
            'autor' => $autores
        ]);




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
    public function destroy(Request $request, $id, $autor_id)
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

        // delete book
        $libro->autors()->detach($autor_id);


        return response()->json(['message' => 'Libro con Autor eliminado correctamente']);
    }
}
