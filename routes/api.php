<?php

use App\Http\Controllers\Api\PathologyController;
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

    // Pathology tests endpoint
    Route::post('create-psa-test', [PathologyController::class, 'import_psa']);
    Route::post('create-blood-sugar-test', [PathologyController::class, 'import_blood_sugar']);
    Route::post('create-blood-group', [PathologyController::class, 'import_blood_group']);
    Route::post('create-creatinine-test', [PathologyController::class, 'import_creatinine']);
    Route::post('create-uran-test', [PathologyController::class, 'import_uran']);
    Route::post('create-pregenacy-test', [PathologyController::class, 'import_pt']);
    Route::post('create-hiv-test', [PathologyController::class, 'import_hiv']);
    Route::post('create-hcv-test', [PathologyController::class, 'import_hcv']);
    Route::post('create-electrolyte-test', [PathologyController::class, 'import_electrolyte']);
    Route::post('create-lipid-profile', [PathologyController::class, 'import_lipid_profile']);
    Route::post('create-liver-function', [PathologyController::class, 'import_liver_functions']);
    Route::post('create-genotype-test', [PathologyController::class, 'import_genotype']);
    Route::post('create-malaria-test', [PathologyController::class, 'import_malaria']);
    Route::post('create-widal-test', [PathologyController::class, 'import_widal']);











    Route::post('add-bitrix', [PcrImportController::class, 'addBitrix']);
});


