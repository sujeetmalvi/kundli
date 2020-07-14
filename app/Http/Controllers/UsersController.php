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
                ->select('userslocations.locationlat','userslocations.locationlong','userslocations.locationdatetime','users.name')->get();
        return view('userslocations', ['data'=>$data]);
    }

    public function usersbtdistances(Request $request){
        $data = DB::table('usersbluetoothtoken')
                ->leftjoin('users','users.id','=','usersbluetoothtoken.user_id')
                ->select('usersbluetoothtoken.bluetoothtoken',
                    'usersbluetoothtoken.distance','users.name')->get();
        return view('usersbtdistances', ['data'=>$data]);
    }


}