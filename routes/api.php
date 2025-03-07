<?php


    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\RoleController;


    Route::get('/roles', [RoleController::class, 'store']);

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



