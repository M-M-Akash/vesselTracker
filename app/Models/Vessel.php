<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vessel extends Model
{
    protected  $fillable=['vessel_category_id','name','serial_no','register_key'];
    public function vesselCategory(){
        return$this->belongsTo(VesselCategory::class);
    }
    public function vesselDeviceInfos(){
        return$this->hasMany(Device::class);
    }
}
