<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LibroController;
    use App\Http\Controllers\AutorController;


    Route::post('/llibre', [LibroController::class, 'store']);

    Route::get('llibres', [LibroController::class, 'index']);
    Route::get('llibres/{id}', [LibroController::class, 'show']);


    Route::post('/autors', [AutorController::class, 'store']);



    Route::any('/', function () {
        return response()->json([
            'status' => 'error',
            'message' => 'Ruta no encontrada. Verifica la URL y prueba de nuevo.'
        ], 404);});

    Route::any('{any}', function () {
        return response()->json([
            'status' => 'error',
            'message' => 'Ruta no encontrada. Verifica la URL y prueba de nuevo.'
        ], 404);
    })->where('any', '.*');



