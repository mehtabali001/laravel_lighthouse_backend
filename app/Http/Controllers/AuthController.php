<?php
namespace App\Http\Controllers;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Session;
use Laravel\Sanctum\PersonalAccessToken;


class AuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->email)->first();

            if (!$user) {
                $user = User::create([
                    'name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'password' => bcrypt('random-password'),
                ]);
            }

          $token = $user->createToken('authToken')->plainTextToken;

      
        return redirect("http://localhost:3000/performance?token=$token&name={$user->name}&email={$user->email}");

            } catch (\Exception $e) {
                return response()->json(['error' => 'Authentication failed'], 401);
            }
    }

    public function logout()
        {
            Auth::logout();
            Session::flush();
            return redirect('/');
        }
}


