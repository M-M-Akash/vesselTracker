<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminRequest;
use App\Services\AdminService;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private $adminService;
    public function __construct(AdminService $adminService)
    {
        $this->middleware('auth');
        $this->adminService=$adminService;
    }
    public function show(){
        $data['vessels']=$this->adminService->getAllVesselInfo();
        return view('admin.showVessels',$data);
    }
    public function index()
    {
        $data['secretKey']=$this->adminService->generateRegisterSecretkey();
        $data['vesselCategories']=$this->adminService->getVesselCategories();
        return view('admin.form',$data);
    }
    public function store(AdminRequest $request){
        $this->adminService->storeFormData($request);
        return redirect()->back()->with('messages','Vessel added successfully');
    }
    public function edit($encryptedId)
    {
        try{
            $data['vessel']= $this->adminService->decryptAndFindvessel($encryptedId);
            $data['selectedCategory']=$this->adminService->selectedCategory($encryptedId);
            $data['vesselCategories']=$this->adminService->getVesselCategories();
        }catch(\Exception $error){
            return back()->with('messages', ':( Something Went Wrong!');
        }
        return view('admin.formEdit',$data);
    }
    public function update($encryptedId, AdminRequest $request)
    {
        try{
            $vessel = $this->adminService->decryptAndFindVessel($encryptedId);
            $this->adminService->updateVessel($vessel, $request);
        }catch(\Exception $error){
            return back()->with('error', ':( Something Went Wrong!');
        }
        return redirect(route('admin.vessel.show',[encrypt($vessel->id)]));
    }
}
