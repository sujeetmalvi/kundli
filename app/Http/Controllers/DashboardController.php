<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Company;
use App\Patient;
use Config;


class DashboardController extends Controller
{

    public function home(){
        $user_id = Auth::user()->id;
        $role = Auth::user()->role_id;
        if($role==1){
            $patient_count = Patient::selectRaw('count(id) as total')->first();
            $doctor_count = User::where('role_id','2')->selectRaw('count(id) as total')->first();
            return view('dashboard.admin_dashboard',['patient_count'=>$patient_count,'doctor_count'=>$doctor_count]);
        }else{
            $patient_count = Patient::where('user_id',$user_id)->selectRaw('count(id) as total')->first();
            return view('dashboard.doctor_dashboard',['patient_count'=>$patient_count]);
        }   
        
    }
    
}