<?php

    namespace App\Http\Controllers;

    use App\Models\Autors;
    use App\Models\Libro;
    use Illuminate\Http\Request;
    use Illuminate\Validation\ValidationException;

    class AutorController extends Controller
    {
        /**
         * Display a listing of the resource.
         */
        public function index()
        {

            $autores = Autors::all();

            if ($autores->isEmpty()) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'No hay autores aún.',
                    'autores' => $autores
                ], 200);
            }

            return response()->json([
                'status' => 'success',
                'autores' => $autores
            ]);
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

                $validated = $request->validate([
                    'nombre' => 'required|string|max:25|min:3',
                ], [
                    'nombre.require' => 'El nombre es oblogatorio',
                    'nombre.min' => 'El nombre debe tener 3 caraceteres',

                    'nombre.max' => 'El contenido debe tener como max 25 caraceteres',
                ]);

                // Crear el rol en la base de datos
                $autor = Autors::create([
                    'nombre' => $validated['nombre']
                ]);

                // Responder con el nuevo rol creado
                return response()->json([
                    'status' => 'success',
                    'message' => 'Autor creado exitosamente',
                    'autor' => $autor
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
        public function show($id)
        {
            //
            $autor = Autors::find($id);

            //
            if (!$autor) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'No existe este autor en la base de datos'
                ], 404);
            }

            //
            return response()->json([
                'status' => 'success',
                'autor' => $autor
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
        public function update(Request $request, $id)
        {
            try {


                $autor = Autors::find($id);

                if (!$autor) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'No existe este autor en la base de datos'
                    ], 404);
                }


                $request->validate([
                    'nombre' => 'required|string|max:25|min:3',
                ], [
                    'nombre.require' => 'El nombre es oblogatorio',
                    'nombre.min' => 'El nombre debe tener 3 caraceteres',

                    'nombre.max' => 'El contenido debe tener como max 25 caraceteres',
                ]);

                $autor->update($request->all());
                return response()->json($autor);


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
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
            //
        }
    }
