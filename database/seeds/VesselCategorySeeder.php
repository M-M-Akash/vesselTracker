<?php


use App\Models\VesselCategory;
use Illuminate\Database\Seeder;


class VesselCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VesselCategory::create([
            'name'=>'General cargo ships'
        ]);

        VesselCategory::create([
            'name'=>'Bulk carriers'
        ]);

        VesselCategory::create([
            'name'=>'Container ships'
        ]);

        VesselCategory::create([
            'name'=>'Auto carriers'
        ]);

        VesselCategory::create([
            'name'=>'Tankers'
        ]);

        VesselCategory::create([
            'name'=>'Fishing vessels'
        ]);

        VesselCategory::create([
            'name'=>'Oil industry vessels'
        ]);

        VesselCategory::create([
            'name'=>'Passenger ships'
        ]);

        VesselCategory::create([
            'name'=>'Ferryboats'
        ]);
    }
}
