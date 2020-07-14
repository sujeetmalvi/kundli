<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\DB;
class AuthController extends Controller
{
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
            'bluetoothtoken' => 'required|string'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'bluetoothtoken'=> $request->bluetoothtoken
        ]);
        $user->save();
        return response()->json(['status'=>true,
            'message' => 'Successfully created user!'
        ], 201);
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
                    'created_at'=> now()
                    ]);        
        if($id){
            return response()->json(['status'=>true,'message' => 'Successfully saved bluetooth token!'], 201);
        }else{
            return response()->json(['status'=>false], 201);
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
            return response()->json(['status'=>true,'message' => 'Successfully saved push token!'], 201);
        }else{
            return response()->json(['status'=>false], 201);
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
            return response()->json(['status'=>true,'message' => 'Successfully checkin!'], 201);

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
            return response()->json(['status'=>true,'message' => 'Successfully checkout!'], 201);

        }        
        return response()->json(['status'=>false,'message' => 'Check Type not found'], 201);
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
                return response()->json(['status'=>true,'message' => 'Successfully saved location!'], 201);
            }else{
                return response()->json(['status'=>false,'message' => 'error'], 201);
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
            return response()->json(['status'=>true,'message' => 'Successfully updated bluetooth token!'], 201);
        }else{
            return response()->json(['status'=>false], 201);
        }
    }
}