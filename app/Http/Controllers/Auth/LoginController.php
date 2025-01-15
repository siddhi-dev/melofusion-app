<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Google OAuth callback. Creates new user if they don't exist
     */
    
    public function googleCallback()
    {
        try {
            $googleUser = \Socialite::driver('google')->stateless()->user();
            if ($googleUser->email == config('services.email')) {
                $user = new User;
                $user->email = $googleUser->email;
    
                Auth::login($user, true);
            }
    
            return redirect()->route('show.index');
        } catch (\Exception $e) {
            \Log::error('Google OAuth Error: ' . $e->getMessage());
            return redirect()->route('google.login')->with('error', 'Authentication failed!');
        }
    }

    /**
     * Redirect to Google OAuth login
     */
    public function redirectToGoogle()
    {
        return $this->socialite()->redirect();
    }

    /**
     * Load 3rd party authentication package
     */
    private function socialite()
    {
        return \Socialite::driver('google');
    }
}
