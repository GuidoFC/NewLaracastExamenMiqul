<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LibroController;


    Route::get('/libro', [LibroController::class, 'store']);

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



