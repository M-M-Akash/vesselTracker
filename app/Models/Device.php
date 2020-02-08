<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable=['vessel_id', 'latitude', 'longitude', 'speed', 'fuel'];
    public function vesselAdminInfo(){
        return $this->belongsTo(Vessel::class);
    }
}
