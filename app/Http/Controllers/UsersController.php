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
        if(Auth::attempt($credentials))
            return redirect()->action('UsersController@dashboard');
        else
            return view('login',['status'=>false,'message' => 'Invalid Credentials']);
        
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function userslocations(Request $request){
        $data = UsersLocations::leftjoin('users','users.id','=','userslocations.user_id')
                ->select('userslocations.locationlat','userslocations.locationlong','userslocations.locationdatetime','users.name')
                ->orderBy('userslocations.id', 'DESC')
                ->get();
        return view('userslocations', ['data'=>$data]);
    }

    public function usersbtdistances(Request $request){
        $data = UsersBluetoothToken::leftjoin('users','users.id','=','usersbluetoothtoken.user_id')
                ->leftjoin('users as user2','user2.id','=','usersbluetoothtoken.bluetoothtoken')
                ->where('usersbluetoothtoken.distance','<=',2)
                ->select('usersbluetoothtoken.bluetoothtoken',
                    'usersbluetoothtoken.distance','users.name','user2.name as user2name','usersbluetoothtoken.created_at')
                ->orderBy('usersbluetoothtoken.id', 'DESC')
                ->get();
        return view('usersbtdistances', ['data'=>$data]);
    }

    public function usersinfectedreport(Request $request){
        $data = User::where('infected_reportedon','!=','')
                ->select('name','infected_reportedon')
                ->orderBy('infected_reportedon', 'DESC')
                ->get();
        return view('usersinfectedreport', ['data'=>$data]);
    }

    public function usershealthreport(Request $request){
        $data = UsersHealth::join('users','users.id','=','usershealth.user_id')
                ->select('name','condition_type','usershealth.created_at')
                ->orderBy('created_at', 'DESC')
                ->get();
        return view('usershealthreport', ['data'=>$data]);
    }


}