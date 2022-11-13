<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function signin(Request $request) {
        try {
            $user = User::where('email', $request->email)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                throw new \Exception('The provided credentials are incorrect.');
            }

            return response()->json([
                'user' => $user,
                'token' => $user->createToken('socialid')->plainTextToken
            ]);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function signup(Request $request) {
        try {
            DB::beginTransaction();

            if (!$request->name) throw new \Exception('Error name exception');
            if (!$request->email) throw new \Exception('Error email exception');
            if (!$request->password) throw new \Exception('Error password exception');
            
            $user = User::where('email', $request->email)->first();
            if ($user) throw new \Exception('Email already taken');

            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            DB::commit();
            return response()->json(['message' => 'Sign up successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }

    public function signout(Request $request) {
        try {
            DB::beginTransaction();

            $requestToken = explode('|', $request->token);

            $token = PersonalAccessToken::where('id', $requestToken[0])->first();
            if (!$token) throw new \Exception('Error token exception');

            $token->delete();

            DB::commit();
            return response()->json(['message' => 'Sign out successfully']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }
        return response()->json($request->token);
    }
}
