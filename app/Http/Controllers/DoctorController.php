<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Company;
use Config;

class DoctorController extends Controller
{

    public function profile(){
        $user_id = Auth::user()->id;
        $user = User::join('company','company.id','=','users.company_id')->where('users.id',$user_id)->select('users.name','users.email','company.company_name as city_name')->first();
        return view('doctor.profile',['data'=>$user]);
    }



}