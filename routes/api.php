<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\LibroController;
    use App\Http\Controllers\AutorController;
    use App\Http\Controllers\AutorHasBookController;


    Route::post('/llibre', [LibroController::class, 'store']);

    Route::get('llibres', [LibroController::class, 'index']);
    Route::get('llibres/{id}', [LibroController::class, 'show']);
    Route::put('llibres/{id}', [LibroController::class, 'update']);
    Route::delete('llibres/{id}', [LibroController::class, 'destroy']);


    Route::post('/autors', [AutorController::class, 'store']);
    Route::get('autors', [AutorController::class, 'index']);
    Route::get('autors/{id}', [AutorController::class, 'show']);
    Route::put('autors/{id}', [AutorController::class, 'update']);
    Route::delete('autors/{id}', [AutorController::class, 'destroy']);

    Route::get('/llibres/{id}/autors', [AutorHasBookController::class, 'showAllBookFromAutor']);


    Route::post('/llibres/{id}/autors/{autor_id}', [AutorHasBookController::class, 'store']);
    Route::delete('/llibres/{id}/autors/{autor_id}', [AutorHasBookController::class, 'destroy']);



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



