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
use Config;

class UsersController extends Controller
{

    public function login(){
        return view('login',['status'=>true,'message' => '']);
    }

    public function process_login(Request $request){
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $credentials = request(['email', 'password']);
        if(Auth::attempt($credentials)){
            // if(Auth::user()->role_id!=2 && Auth::user()->role_id!=1){
            //     return view('login',['status'=>false,'message' => 'Unauthorized Access']);    
            // }
            return redirect()->action('UsersController@dashboard');
        }else{
            return view('login',['status'=>false,'message' => 'Invalid Credentials']);
        }
    }

    public function dashboard(){
        $data = UsersHealth::select('condition_type',\DB::raw('count(condition_type) as usercount'))
                ->groupBy('condition_type')
                ->orderBy('condition_type','ASC')
                ->get(); 
                //  ->dd();
                //  $sql = str_replace_array('?', $data->getBindings(), $data->toSql());
                // return dd($sql);   
                $ddata_arr = array();
            foreach($data as $d){
                $ddata_arr[Config::get('constants.CONDITION_TYPES.'.$d->condition_type)] = $d->usercount;
                //$ddata_arr[$d->condition_type] = $d->usercount;
            }    
            
            //print_r($ddata_arr); die();
        return view('dashboard',['data'=>$ddata_arr]);
    }

    public function users(){
        $company_id = Auth::user()->company_id;
        $data = User::join('company','company.id','=','users.company_id')
                ->select('users.id','users.name','users.email','company.company_name');
                if(Auth::user()->role_id!=1){        
                $data = $data->where('users.company_id',$company_id);
                }
        $data = $data->orderby('users.name')->get();
        
        $company = Company::select('id','company_name')->orderby('company_name')->get();
        return view('users',['data'=>$data,'company'=>$company]);
    }

    public function create_user(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $company_id = $request->company_id;
        $role_id = $request->role_id;


        $id = User::insertGetId([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'company_id' => $company_id,
            'role_id' => $role_id,
            'created_at'=> now()->setTimezone('UTC')
        ]);        
        if($id){
            
            $this->sendEmail('Aarogya Kundli Account Creation', 'http://arogyakundli.com/kundli/login',$email,$password, $email, $emailFrom = "");

            return response()->json(['status'=>true,'message' => 'New User Created Successfully']);
        }else{
            return response()->json(['status'=>false,'message' => 'Error']);
        }

    }

    public function userslocations(Request $request){
        $company_id = Auth::user()->company_id;
        $data = UsersLocations::leftjoin('users','users.id','=','userslocations.user_id')
                ->select('userslocations.locationlat','userslocations.locationlong','userslocations.locationdatetime','users.name')
                ->where('users.company_id',$company_id)
                ->orderBy('userslocations.id', 'DESC')
                ->get();
        return view('userslocations', ['data'=>$data]);
    }



    // public function usersinfectedreport(Request $request){
    //     $company_id = Auth::user()->company_id;
    //     $data = User::where('infected_reportedon','!=','')
    //             ->select('name','infected_reportedon')
    //             ->where('users.company_id',$company_id)
    //             ->orderBy('infected_reportedon', 'DESC')
    //             ->get();
    //     return view('usersinfectedreport', ['data'=>$data]);
    // }

    // public function usershealthreport(Request $request){
    //     $company_id = Auth::user()->company_id;
    //     $data = UsersHealth::join('users','users.id','=','usershealth.user_id')
    //             ->select('name','condition_type','usershealth.created_at')
    //             ->where('users.company_id',$company_id)
    //             ->orderBy('created_at', 'DESC')
    //             ->get();
    //     return view('usershealthreport', ['data'=>$data]);
    // }


}