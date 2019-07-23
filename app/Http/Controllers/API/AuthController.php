<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Model\User;
use DB;
use Auth;

class AuthController extends Controller
{

    public function register(Request $request) {
        $params = $request->only('email', 'name', 'password', 'password_confirmation');
        $user = User::where('email', $params['email'])->first();
        if ($user === null) {
            try {
                $user = User::create([
                    'name' => $params['name'],
                    'email' => $params['email'],
                    'password' => Hash::make($params['password'])
                ]);
                // var_dump(is_a($user, 'App\Model\User'));
                // exit();

                // $token = auth()->login($user);
                $token = \JWTAuth::login($user);
                // return $this->respondWithToken($token);
                return response()->json(compact('user','token'),201);
            } catch (\Exception $ex) {
                return response()->json(['error' => $ex->getMessage()], 500);
            }
        }
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
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

    // public function register(Request $request) {
    //     $params = $request->only('email', 'name', 'password', 'password_confirmation');
    //     $user = User::where('email', $params['email'])->first();
    //     if ($user === null) {
    //         try {
    //             $user = User::create([
    //                 'name' => $params['name'],
    //                 'email' => $params['email'],
    //                 'password' => Hash::make($params['password']),
    //             ]);
    //             // echo "<pre/>";
    //             // print_r($user->name);
    //             // exit();
    //             $token = $user->createToken($user->name)->accessToken;
    //             return response()->json(['access_token' => $token], 201);
    //         }
    //         catch (Exception $ex) {
    //             return response()->json(['error_message' => $ex->getMessage()], 500);
    //         }
    //     }
    //     return response()->json(['error_message' => 'User has been existed.'], 500);
    // }

    // public function login(Request $request) {
    //     $params = $request->only('email', 'password');
    //     $user = User::where('email', $params['email'])->first();
    //     if ($user->exists()) {
    //         $auth = Hash::check($request->get('password'), $user->password);
    //         if ($auth) {
    //             $token = $user->createToken($user->name)->accessToken;
    //             return response()->json(['access_token' => $token], 201);
    //         }
    //     }
    //     return response()->json(['error_message' => 'Email or password is invalid'], 500);
    // }

    // public function logout(Request $request) {
    //     if ($accessToken = $request->header('Authorization')) {
    //         DB::table('oauth_access_tokens')->where('id', $accessToken)
    //     ->update(['revoked' => 1]);
    //         return response()->json(200);
    //     }
    //     return response()->json(['error_message' => 'Can\'t validate request'], 500);
    // }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => \JWTAuth::factory()->getTTL() * 60
        ]);
    }
}
