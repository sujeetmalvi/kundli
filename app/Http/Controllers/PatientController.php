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
use App\Utilities\Common_helper;

class PatientController extends Controller
{

    public function patient_list($type=''){
        $user_id = Auth::user()->id;
        if(Auth::user()->role_id==2){
            if($type=='alloted'){
                $data = Patient::where('user_id',$user_id)->get();
            }
            if($type=='examin'){
                $data = Patient::join('prescription','patient.id','=','prescription.patient_id')->where('user_id',$user_id)->get();
            }
            
        }else{
            $data = Patient::join('users','users.id','=','patient.user_id')->select('patient.name','patient.prakrati','patient.phone','patient.email','patient.city','users.name as doctor')->get();
        }
        
        return view('patient.patient',['view'=>'list','data'=>$data,'company'=>array()]);
    }

    public function new_patient(){
        return view('patient.patient',['view'=>'new','data'=>array(),'company'=>array()]);
    }

    public function save_patient(Request $request){
        /*
        print_r($request->all());
        */
        $user_id = Auth::user()->id;
        $prakrati = $request->prakrati;
        $agegroup = $request->agegroup; 
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
        $bloodgroup = $request->bloodgroup;
        $wardno = $request->wardno;
        $suggestions = $request->suggestions;
        $remarks = $request->remarks;
        
        $id = Patient::insertGetId([
            'name' => $name,
            'user_id' => $user_id,
            'prakrati'=>$prakrati,
            'agegroup' =>$agegroup,
            'gender' => $gender,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'state' => $state,
            'city' => $city,
            'age' => $age,
            'weight' => $weight,
            'height' => $height,
            'bloodgroup'=>$bloodgroup,
            'wardno'=>$wardno,
            'created_at'=> now()->setTimezone('Asia/Kolkata')
        ]);        
        if($id){
            $pid = Prescription::insertGetId([
            'patient_id' => $id,
            'diagnose'=>$diagnose,
            'prescription' => $prescription,
            'precautions' => $precautions,
            'suggestions' => $suggestions,
            'remarks' => $remarks
        ]);        
            return view('patient.patient',['view'=>'new','data'=>array(),'status'=>true,'message' => 'New Patient Created Successfully']);
        }else{
            return view('patient.patient',['view'=>'new','data'=>array(),'status'=>false,'message' => 'Error']);
        }
    }
    
    public function delete_patient($id){
        $status = Common_helper::delete_records('patient','id',$id);
        if($status){
            return redirect('/patient_list')->with(['status' => true,'message' => 'Patient Deleted Successfully']);
        }else{
            return redirect('/patient_list')->with(['status' => true,'message' => 'Error']);
        }
        
        
    }

}