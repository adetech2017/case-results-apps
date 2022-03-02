<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TestResultImport;
use Symfony\Component\HttpFoundation\Response;

class PcrImportController extends Controller
{
    /**
     * prc file import
     */
    public function prc_import(Request $request)
    {
        Excel::import(new TestResultImport, $request->file('file')->store('temp'));
        return response()->json([
            'message' => 'File import successfully.'
        ], Response::HTTP_OK);
    }
}
