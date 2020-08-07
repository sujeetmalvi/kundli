<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
//use Benwilkins\FCM\FcmMessage;
class AuthController extends Controller
{

function sendNotification()
{
    //$token = [];
    //$token = DB::table('users')->where('device_token','!=','')->get()->pluck('device_token');

    $url = 'https://fcm.googleapis.com/fcm/send';
    //foreach ($token as $tok) {
        $fields = array(
            //'to' => $tok, // for device token user token else use topic name 
            'to' => "/topics/bluetooth", //           
            'data' => $message = array(
                "message" => "Flair - Testing",
                "dialog_id" => '1',
                "content_added"=>'0'
                )
        );
        $headers = array(
            'Authorization: key=AAAAqrSVdvg:APA91bFdhL80bQBoIARIO7usIgQpN_N-koHg5VWLQsqFc3owjQkKKfdrrQk8Rcpq64AnJLmgb8I8OEVc6buszb1atoDztsheFzXsTUDVXeb5iM52Q8LnUR9RxGuOFu7vE0pgKLIrSOXs',
            'Content-type: Application/json'
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        curl_exec($ch);
        curl_close($ch);
    //}

    $res = ['error' => null, 'result' => "Notification sent"];

    return $res;
}


// public function toFcm(Request $request) 
// {

//  $request->user->notify();

// }


   
    /**
     * Create user
     *
     * @param  [string] name
     * @param  [string] email
     * @param  [string] password
     * @param  [string] password_confirmation
     * @return [string] message
     */
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
            'bluetoothtoken' => 'required|string',


        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bluetoothtoken'=> $request->bluetoothtoken,
            'device_token'=> $request->device_token,
        ]);
        $user->save();
        return response()->json(['status'=>true,
            'message' => 'Successfully created user!'
        ], 200);
    }
  
    public function registerbluetooth(Request $request)
    {
        $request->validate([
            'bluetoothtoken' => 'required|string',
            'distance' => 'required',

        ]);
        $bluetoothtoken = $request->bluetoothtoken;
        $distance = $request->distance;
        $user_id = $request->user()->id;

        $id = DB::table('usersbluetoothtoken')->insertGetId([
                    'user_id' => $user_id,
                    'bluetoothtoken' => $bluetoothtoken,
                    'distance' => $distance,
                    'created_at'=> now()->setTimezone('UTC')
                    ]);        
        if($id){
            return response()->json(['status'=>true,'message' => 'Successfully saved bluetooth token!'], 200);
        }else{
            return response()->json(['status'=>false], 200);
        }
    }

    public function registerpush(Request $request)
    {
        $request->validate([
            'pushtoken' => 'required|string'
        ]);

        $pushtoken = $request->pushtoken;
        $user_id = $request->user()->id;
        $user = DB::table('users')
                ->where('id', $user_id)
                ->update(['pushtoken' => $pushtoken]);
        if($user){
            return response()->json(['status'=>true,'message' => 'Successfully saved push token!'], 200);
        }else{
            return response()->json(['status'=>false], 200);
        }
    }


    public function usercheckinout(Request $request)
    {
        $request->validate([
            'checktype' => 'required|string'
        ]);

        $user_id = $request->user()->id;

        if($request->checktype=='checkin'){

            $request->validate([
                'record_date' => 'required|string',
                'checkindatetime'=>'required',
                'checkinlat'=>'required',
                'checkinlong'=>'required'
            ]);

            $id = DB::table('userscheckinout')->insertGetId([
                    'user_id' => $user_id,
                    'record_date' => $request->record_date,
                    'checkindatetime' => $request->checkindatetime,
                    'checkinlat' => $request->checkinlat,
                    'checkinlong' => $request->checkinlong,
                    'created_at'=> now()
                    ]);
            return response()->json(['status'=>true,'message' => 'Successfully checkin!'], 200);

        }elseif($request->checktype=='checkout'){

            $request->validate([
                'record_date' => 'required|string',
                'checkoutdatetime'=>'required',
                'checkoutlat'=>'required',
                'checkoutlong'=>'required'
            ]);

            $affected = DB::table('userscheckinout')
                      ->where('user_id',$user_id)
                      ->where('record_date',$request->record_date)
                      ->update([
                        'checkoutdatetime' => $request->checkoutdatetime,
                        'checkoutlat' => $request->checkoutlat,
                        'checkoutlong' => $request->checkoutlong,
                        'updated_at'=> now()
                        ]);
            return response()->json(['status'=>true,'message' => 'Successfully checkout!'], 200);

        }        
        return response()->json(['status'=>false,'message' => 'Check Type not found'], 200);
    }



    public function userslocations(Request $request)
    {

            $request->validate([
                'locationdatetime' => 'required',
                'locationlat'=>'required',
                'locationlong'=>'required'
            ]);

            $user_id = $request->user()->id;

            $id = DB::table('userslocations')->insertGetId([
                    'user_id' => $user_id,
                    'locationdatetime' => $request->locationdatetime,
                    'locationlat' => $request->locationlat,
                    'locationlong' => $request->locationlong,
                    'created_at'=> now(),
                    'updated_at'=> now()
                    ]);
            if($id){
                return response()->json(['status'=>true,'message' => 'Successfully saved location!'], 200);
            }else{
                return response()->json(['status'=>false,'message' => 'error'], 200);
            }

    }


    /**
     * Login user and create token
     *
     * @param  [string] email
     * @param  [string] password
     * @param  [boolean] remember_me
     * @return [string] access_token
     * @return [string] token_type
     * @return [string] expires_at
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return response()->json(['status'=>false,
                'message' => 'Unauthorized'
            ], 401);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json(['status'=>true,
                'access_token' => $tokenResult->accessToken,
                'token_type' => 'Bearer',
                'id'=> $user->id,
                'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ]);
    }
  
    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json(['status'=>true,
            'message' => 'Successfully logged out'
        ]);
    }
  
    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request)
    {
        return response()->json($request->user());
    }
    
    
    public function updatebluetoothtoken(Request $request)
    {
        $request->validate([
            'bluetoothtoken' => 'required|string'
        ]);

        $bluetoothtoken = $request->bluetoothtoken;
        $user_id = $request->user()->id;
        $user = DB::table('users')
                ->where('id', $user_id)
                ->update(['bluetoothtoken' => $bluetoothtoken]);
        if($user){
            return response()->json(['status'=>true,'message' => 'Successfully updated bluetooth token!'], 200);
        }else{
            return response()->json(['status'=>false], 200);
        }
    }

public function usersservey(Request $request){
            $request->validate([
                'questionid' => 'required',
                'answer'=>'required'
            ]);

            $user_id = $request->user()->id;

            foreach ($request->questionid as $key => $qid) {
                $id = DB::table('usersservey')->insertGetId([
                        'user_id' => $user_id,
                        'questionid' => $request->questionid[$key],
                        'answer' => $request->answer[$key],
                        'created_at'=> now(),
                        'updated_at'=> now()
                        ]);
            }
            if($id){
                return response()->json(['status'=>true,'message' => 'Successfully saved location!'], 200);
            }else{
                return response()->json(['status'=>false,'message' => 'error'], 200);
            }
}


    public function updatedevicetoken(Request $request)
    {
        $request->validate([
            'device_token' => 'required|string'
        ]);

        $device_token = $request->device_token;
        $user_id = $request->user()->id;
        $user = DB::table('users')
                ->where('id', $user_id)
                ->update(['device_token' => $device_token]);
        if($user){
            return response()->json(['status'=>true,'message' => 'Successfully updated device token!'], 200);
        }else{
            return response()->json(['status'=>false], 200);
        }
    }


}
