<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
class UsersController extends Controller
{

    public function userslocations(Request $request){
        $data = DB::table('userslocations')
                ->leftjoin('users','users.id','=','userslocations.user_id')
                ->select('userslocations.locationlat','userslocations.locationlong','userslocations.locationdatetime','users.name')
                ->orderBy('userslocations.id', 'DESC')
                ->get();
        return view('userslocations', ['data'=>$data]);
    }

    public function usersbtdistances(Request $request){
        $data = DB::table('usersbluetoothtoken')
                ->leftjoin('users','users.id','=','usersbluetoothtoken.user_id')
                ->leftjoin('users as user2','user2.id','=','usersbluetoothtoken.bluetoothtoken')
                ->where('usersbluetoothtoken.distance','<=',2)
                ->select('usersbluetoothtoken.bluetoothtoken',
                    'usersbluetoothtoken.distance','users.name','user2.name as user2name','usersbluetoothtoken.created_at')
                ->orderBy('usersbluetoothtoken.id', 'DESC')
                ->get();
        return view('usersbtdistances', ['data'=>$data]);
    }

    public function usersinfectedreport(Request $request){
        $data = DB::table('users')
                ->where('infected_reportedon','!=','')
                ->select('name','infected_reportedon')
                ->orderBy('infected_reportedon', 'DESC')
                ->get();
        return view('usersinfectedreport', ['data'=>$data]);
    }


}