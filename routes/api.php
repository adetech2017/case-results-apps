<?php

use App\Http\Controllers\Api\PcrImportController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Row;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['cors'])->group(function ()
{
    Route::post('upload-pcr-file', [PcrImportController::class, 'prc_import']);
    Route::post('add-new-result', [PcrImportController::class, 'new_results']);
    Route::post('add-new-antigen', [PcrImportController::class, 'new_atigen']);
    Route::post('create-hep-test', [PcrImportController::class, 'new_hpyer_b_test']);
});


