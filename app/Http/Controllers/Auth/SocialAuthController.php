<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    protected $providers = [
        'github',
        'facebook',
        'google',
        'twitter',
    ];

    public function redirectToProvider($provider)
    {
        if (!$this->isProviderAllowed($provider)) {
            return $this->sendFailedResponse("{$provider} không được hỗ trợ");
        }
        try {
            return Socialite::driver($provider)->redirect();
        } catch (Exception $e) {
            // You should show something simple fail message
            return $this->sendFailedResponse($e->getMessage());
        }
    }

    public function handleProviderCallback($provider)
    {
        try {
            $user = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return $this->sendFailedResponse($e->getMessage());
        }
        // check for email in returned user
        return empty($user->email)
        ? $this->sendFailedResponse(trans('validation.email'))
        : $this->loginOrCreateAccount($user, $provider);
    }

    protected function sendSuccessResponse()
    {
        return redirect()->intended('/');
    }

    protected function sendFailedResponse($msg = null)
    {
        return redirect()->route('login')->withErrors(['msg' => $msg ?: trans('translate.error_login')]);
    }

    public function loginOrCreateAccount($providerUser, $provider)
    {
        // check for already has account
        $user = User::where('email', $providerUser->getEmail())->first();
        // if user not found
        if (!$user) {
            // create a new user
            $user = User::create([
                'name' => $providerUser->getName(),
                'avatar' => '',
                'email' => $providerUser->getEmail(),
                'provider' => $provider,
                'provider_id' => $providerUser->getId(),
                'access_token' => $providerUser->token,
                // user can use reset password to create a password
                'password' => '',
                'role_id' => 2,
            ]);
        }
        // login the user
        Auth::login($user, true);
        return $this->sendSuccessResponse();
    }

    private function isProviderAllowed($provider)
    {
        return in_array($provider, $this->providers) && config()->has("services.{$provider}");
    }
}
