<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VesselCategory extends Model
{
    protected $fillable = ['name'];
    public function vesselsAdminInfo(){
        return $this->hasMany(Vessel::class);
    }
}
