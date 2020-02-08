<?php

namespace App\Http\Controllers;

use App\Services\Logger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MapController extends Controller
{
    public function getData(Request $request){

        Log::info($request);
        Log::info($request->lat);
        Log::info($request->lon);
        return response()->json([
            'status' => 'OK'
        ], 200);
    }
}
