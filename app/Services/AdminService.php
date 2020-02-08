<?php


namespace App\Services;
use App\Models\Vessel;
use App\Models\VesselCategory;

class adminService
{
    public function getVesselCategories(){
        return VesselCategory::all();
    }
    public function getAllVesselInfo(){
        return Vessel::all();
    }
    /*public function getCategoryInfo(){
        $vessels=Vessel::all();
        $categoryId=[];
        foreach ($vessels as $vessel){
            array_push($categoryId,$vessel->vessel_category_id);
        }
        return VesselCategorySeeder::whereIn('id',$categoryId)->get();
    }*/
    public function generateRegisterSecretkey()
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz@#$&*";
        $randomString = '';
        for ($i = 0; $i < 6; $i++) {
            $index = rand(0, strlen($chars) - 1);
            $randomString .= $chars[$index];
        }
        return $randomString;
    }
    public function storeFormData($request){
        $validated=$request->validated();
        Vessel::create($validated);
    }
    public function decryptAndFindVessel($encryptedId)
    {
        $id = decrypt($encryptedId);
        return Vessel::find($id);
    }
    public function updateVessel($vessel, $request)
    {
        $validated=$request->validated();
        $vessel->update($validated);
    }
    public function selectedCategory($encryptedId){
        $id=decrypt($encryptedId);
        $vesselInfo=Vessel::find($id);
        return VesselCategory::find($vesselInfo->vessel_category_id);
    }

}
