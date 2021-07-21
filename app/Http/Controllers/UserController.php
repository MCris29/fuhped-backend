<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Resources\User as UserResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserController extends Controller
{
    public static $messages = [];
    public static $rules = [
        'name' => 'nullable|string',
        'last_name' => 'nullable|string',
        'phone' => 'nullable|string',
        'email' => 'nullable|e-mail',
        'password' => 'nullable|confirmed',
    ];

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        $user = JWTAuth::user();
        return response()->json(compact('token', 'user'))
            ->withCookie(
                'token',
                $token,
                config('jwt.ttl'), // ttl => time to live
                '/', // path
                null, // domain
                config('app.env') !== 'local', // secure
                true, // httpOnly
                false,
                config('app.env') !== 'local' ? 'None' : 'Lax' // SameSite
            );
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone' => 'string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = User::create([
            'name' => $request->get('name'),
            'last_name' => $request->get('last_name'),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return response()->json(compact('user'), 201);
    }

    public function getAuthenticatedUser()
    {
        try {
            if (!$user = JWTAuth::parseToken()->authenticate()) {
                dd($user);
                return response()->json(['user_not_found'], 404);
            }
        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            return response()->json(['token_expired'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            return response()->json(['token_invalid'], $e->getStatusCode());
        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {
            return response()->json(['token_absent'], $e->getStatusCode());
        }
        return response()->json(new UserResource($user), 200);
    }

    public function show()
    {
        //        return response()->json(new UserResource($user), 200);
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $request->validate(self::$rules, self::$messages);
        $user->update($request->all());
        return response()->json($user, 200);
    }

    public function logout()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return response()->json([
                "status" => "success",
                "message" => "User successfully logged out."
            ], 200)
                ->withCookie('token', null,
                    config('jwt.ttl'),
                    '/',
                    null,
                    config('app.env') !== 'local',
                    true,
                    false,
                    config('app.env') !== 'local' ? 'None' : 'Lax'
                );
        } catch (JWTException $e) {
            // something went wrong whilst attempting to encode the token
            return response()->json(["message" => "No se pudo cerrar la sesión."], 500);
        }
    }
}
