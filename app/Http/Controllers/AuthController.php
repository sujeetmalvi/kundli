<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\Userlogindetails;
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
            'password' => 'required|string|confirmed'
        ]);
        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->save();
        return response()->json([
            'message' => 'Successfully created user!'
        ], 201);
    }
  
    public function registerbluetooth(Request $request)
    {
        $bluetoothtoken = $request->bluetoothtoken;
        $user_id = $request->user()->id;
        $user = DB::table('users')
                ->where('id', $user_id)
                ->update(['bluetoothtoken' => $bluetoothtoken]);
        if($user){
            return response()->json(['message' => 'Successfully saved bluetooth token!'], 201);
        }
    }

    public function registerpush(Request $request)
    {
        $pushtoken = $request->pushtoken;
        $user_id = $request->user()->id;
        $user = DB::table('users')
                ->where('id', $user_id)
                ->update(['pushtoken' => $pushtoken]);
        if($user){
            return response()->json(['message' => 'Successfully saved push token!'], 201);
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
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);

/*
        $userlogindetails = new Userlogindetails([
            'user_id' => $request->id,
            'checkin' => Carbon::now()->->format('Y-m-d H:i:s'),
            'checkout' => '0',
            'created_at' => Carbon::now()->format('Y-m-d')
        ]);
        $userlogindetails->save();
*/

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        return response()->json([
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
        return response()->json([
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
}