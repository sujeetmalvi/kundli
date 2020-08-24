<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
class ReportsController extends Controller
{

    public function rpt_active_cases(){
        $data = DB::table('users')
                ->where('infected_reportedon','!=','')
                ->select('name','infected_reportedon','users.id')
                ->orderBy('infected_reportedon', 'DESC')
                ->get();
        return view('rpt_active_cases',['data'=>$data]);
    }

    public function rpt_1stdegree_endangered($user_id){
        $data = DB::table('usersbluetoothtoken')
                ->leftjoin('users','users.id','=','usersbluetoothtoken.bluetoothtoken')
                ->where('usersbluetoothtoken.distance','<=',2)
                ->where('usersbluetoothtoken.user_id','=',$user_id)
                ->select('usersbluetoothtoken.distance','users.name as user2name','usersbluetoothtoken.created_at')
                ->orderBy('usersbluetoothtoken.id', 'DESC')
                ->get();
    // ->dd();
    // $sql = str_replace_array('?', $data->getBindings(), $data->toSql());
    // return dd($sql);    
        return view('rpt_1stdegree_endangered', ['data'=>$data]);
    }

    public function rpt_2nddegree_endangered($user_id){

        $data = DB::table('usersbluetoothtoken')
                ->leftjoin('users','users.id','=','usersbluetoothtoken.bluetoothtoken')
                ->where('usersbluetoothtoken.distance','<=',2)
                ->where('usersbluetoothtoken.user_id','=',$user_id)
                ->selectRaw('group_concat(distinct(usersbluetoothtoken.bluetoothtoken)) as users_ids')
                ->first();

     // ->dd();
     // $sql = str_replace_array('?', $data->getBindings(), $data->toSql());
     // return dd($sql);   

        $data = DB::table('usersbluetoothtoken')
                ->leftjoin('users','users.id','=','usersbluetoothtoken.bluetoothtoken')
                ->where('usersbluetoothtoken.distance','<=',2)
                ->where('usersbluetoothtoken.bluetoothtoken','!=',$user_id)
                ->wherein('usersbluetoothtoken.user_id',[$data->users_ids])
                ->select('usersbluetoothtoken.distance','users.name as user2name','usersbluetoothtoken.created_at')
                ->orderBy('usersbluetoothtoken.id', 'DESC')
                ->get();
      //             ->dd();
      // $sql = str_replace_array('?', $data->getBindings(), $data->toSql());
      // return dd($sql);   


        return view('rpt_2nddegree_endangered', ['data'=>$data]);
    }
}