<?php

namespace App\Jobs;

use App\Models\Device;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;

class SyncDeviceInformationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $vesselId;
    private $latitude;
    private $longitude;
    private $speed;

    /**
     * Create a new job instance.
     *
     * @param $vesselId
     * @param $latitude
     * @param $longitude
     * @param $speed
     */
    public function __construct($vesselId, $latitude, $longitude, $speed)
    {
        $this->vesselId = $vesselId;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->speed = $speed;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            Log::info('Inside sync job');
            $device = Device::where('vessel_id', $this->vesselId)->first();
            if (isset($device)) {
                $device->update([
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'speed' => $this->speed,
                ]);
            } else {
                Device::create([
                    'vessel_id' => $this->vesselId,
                    'latitude' => $this->latitude,
                    'longitude' => $this->longitude,
                    'speed' => $this->speed,
                ]);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
        }
    }
}
