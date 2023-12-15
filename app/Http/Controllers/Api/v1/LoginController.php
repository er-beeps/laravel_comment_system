<?php
namespace App\Http\Controllers\Api\v1;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    /**
     * login function
     */
    public function login(Request $request){
        $credential= $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        if(!auth()->attempt($credential)){
            return response()->json(['error'=>true,'message'=>'Invalid Credentials']);
        }
        if(!auth()->user()->is_active){
            auth()->logout();
            return response()->json(['error'=>true,'message'=>'Invalid Credentials']);
        }
        $accessToken =auth()->user()->createToken('authToken')->accessToken;

        $user = User::find(Auth::user()->id);

        return response()->json(['error'=>false,'user'=>$user,'access_token'=>$accessToken,'message'=>'Login Successfully.']);
    }
}
