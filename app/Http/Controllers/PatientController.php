<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use Config;

class PatientController extends Controller
{

    public function patient_list(){
        //$user_id = Auth::user()->id;
        $user = array(); //User::join('company','company.id','=','users.company_id')->where('users.id',$user_id)->select('users.name','users.email','company.company_name as city_name')->first();
        return view('patient.patient',['view'=>'list','data'=>$user,'company'=>array()]);
    }

    public function new_patient(){
        return view('patient.patient',['view'=>'new','data'=>array(),'company'=>array()]);
    }

    public function save_patient(Request $request){
        /*
        print_r($request->all());
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
        $patient = 
        */
        return view('patient.patient',['view'=>'new','data'=>array(),'company'=>array()]);
    }

}