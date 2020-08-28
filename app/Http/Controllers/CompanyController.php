<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\User;
use App\UsersLocations;
use App\UsersBluetoothToken;
use App\UsersHealth;
use App\Company;

class CompanyController extends Controller
{

    public function company(){
        $data = Company::select('id','company_name')->orderby('company_name')->get();
        return view('company',['data'=>$data]);
    }

    // public function create_user(Request $request){

    //     $name = $request->name;
    //     $email = $request->email;
    //     $password = $request->password;
    //     $company_id = $request->company_id;

    //     $id = User::insertGetId([
    //         'name' => $name,
    //         'email' => $email,
    //         'password' => bcrypt($password),
    //         'company_id' => $company_id,
    //         'created_at'=> now()->setTimezone('UTC')
    //     ]);        
    //     if($id){
    //         return response()->json(['status'=>true,'message' => 'New User Created Successfully']);
    //     }else{
    //         return response()->json(['status'=>false,'message' => 'Error']);
    //     }
    // }

}