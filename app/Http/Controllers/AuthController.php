<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use DB;
class AuthController extends Controller
{
    
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
      // $this->middleware('auth:api', ['except' => ['login']]);
       $this->middleware('JWT', ['except' => ['login','signup']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|max:50|email',
           
            'password' => 'required|min:8',
        ]);
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Email Or Password Incorrect'], 401);

        }

        return $this->respondWithToken($token);
    }

    //   public function login() {
    //     // get email and password from request
    //     $credentials = request(['email', 'password']);
        
    //     // try to auth and get the token using api authentication
    //     if (!$token = auth('api')->attempt($credentials)) {
    //         // if the credentials are wrong we send an unauthorized error in json format
    //         return response()->json(['error' => 'Unauthorized'], 401);
    //     }
    //     return response()->json([
    //         'token' => $token,
    //         'type' => 'bearer', // you can ommit this
    //         'expires' => auth('api')->factory()->getTTL() * 60, // time to expiration
            
    //     ]);
    // }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60,
            'email' => Auth()->user()->email,
            'name' => Auth()->user()->name,
            'user_id' => Auth()->user()->id,
        ]);
    }


     public function signup(Request $request)
    {
         $validatedData = $request->validate([
            'email' => 'required|unique:users|max:255',
            'name' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

         $data=array();
         $data['name']=$request->name;
         $data['email']=$request->email;
         $data['password'] = Hash::make($request->password);
         DB::table('users')->insert($data);

         return $this->login($request);
    }
}
