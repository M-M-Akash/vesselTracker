<?php

namespace App\Http\Controllers\Api;

use App\Jobs\SyncDeviceInformationJob;
use App\Models\Device;
use App\Models\Vessel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DeviceController extends Controller
{
    public function getDeviceInformation (Request $request) {
        try {
            Log::info($request->rsk);
            $rules = [
                'rsk' => 'required|string|max:200',
                'lat' => 'required|numeric|max:50',
                'lon' => 'required|numeric|max:50',
                'speed' => 'required|numeric|max:50',
            ];

            $validator = Validator::make($request->all(), $rules);
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validator->errors()->first()
                ], 500);
            }

            $vessel = Vessel::where('register_key', $request->rsk)->first();
            if (!isset($vessel)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Vessel not found'
                ], 500);
            }

            dispatch(new SyncDeviceInformationJob($vessel->id, $request->lat, $request->lon, $request->speed));

            return response()->json([
                'success' => true,
            ], 200);

        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong'
            ], 500);
        }
    }
}
