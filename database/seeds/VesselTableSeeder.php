<?php

use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class VesselTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     * @throws Exception
     */
    public function run()
    {
        \App\Models\Vessel::create([
            'vessel_category_id' => 1,
            'name' => 'Vessel A',
            'serial_no' => 'vessel001',
            'register_key' => Uuid::uuid4()
        ]);
    }
}
