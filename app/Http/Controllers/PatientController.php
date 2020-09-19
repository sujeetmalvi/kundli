<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Patient;
use App\Prescription;
use Config;

class PatientController extends Controller
{

    public function patient_list(){
        //$user_id = Auth::user()->id;
        $data = Patient::get();
        return view('patient.patient',['view'=>'list','data'=>$data,'company'=>array()]);
    }

    public function new_patient(){
        return view('patient.patient',['view'=>'new','data'=>array(),'company'=>array()]);
    }

    public function save_patient(Request $request){
        /*
        print_r($request->all());
        */
        $prakrati = $request->prakrati;
        $name = $request->name;
        $gender = $request->gender;
        $phone = $request->phone;
        $email = $request->email;
        $address = $request->address;
        $state = $request->state;
        $city = $request->city;
        $age = $request->age;
        $weight = $request->weight;
        $height = $request->height;
        $diagnose = $request->diagnose;
        $prescription = $request->prescription;
        $precautions = $request->precautions;
        
        $id = Patient::insertGetId([
            'name' => $name,
            'prakrati'=>$prakrati,
            'gender' => $gender,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'state' => $state,
            'city' => $city,
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'created_at'=> now()->setTimezone('Asia/Kolkata')
        ]);        
        if($id){
            $pid = Prescription::insertGetId([
            'patient_id' => $id,
            'diagnose'=>$diagnose,
            'prescription' => $prescription,
            'precautions' => $precautions
        ]);        
            return view('patient.patient',['view'=>'new','data'=>array(),'status'=>true,'message' => 'New Patient Created Successfully']);
        }else{
            return view('patient.patient',['view'=>'new','data'=>array(),'status'=>false,'message' => 'Error']);
        }
        
        
    }

}