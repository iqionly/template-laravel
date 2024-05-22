<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Contracts\Auth\Factory as AuthFactory;
use \Illuminate\Contracts\Auth\Guard as AuthGuard;
use \Illuminate\Contracts\Auth\StatefulGuard as AuthStateful;
use Illuminate\Support\Facades\Route;

class AuthController extends Controller
{
    /**
     * Path for auths views
     *
     * @var string $viewPath
     */
    protected static string $viewPath = 'auths.';

    protected static string $requestFrom;

    protected static string $homeRoute = 'home';

    public function __construct()
    {

    }

    public function index(Request $request)
    {
        if($request->expectsJson())
            return response()->json(['message' => 'Login Page']);

        return view(self::$viewPath . 'login');
    }

    public function login(Request $request)
    {
        $identifier = $this->validateLoginRequest($request);

        // get only identifier and password
        $credentials = $request->only($identifier, 'password');

        $authenticated = auth()->attempt($credentials);

        if($request->expectsJson() && $authenticated)
            return response()->json(['message' => 'Login Success']);
        elseif($request->expectsJson())
            return response()->json(['message' => 'Login Failed'], 401);

        if($authenticated)
            return redirect()->intended(self::getHomeRoute())->with('success', 'auth.success');

        return redirect()->back()
            ->withErrors([
                'message' => 'auth.failed'
            ])
            ->withInput($request->only($identifier));
    }

    public function logout(Request $request)
    {
        auth()->logout();

        if($request->expectsJson())
            return response()->json(['message' => 'Logout Success']);

        return redirect()->route('login-page');
    }

    public static function getHomeRoute()
    {
        // Check route home is exist
        if(Route::has(self::$homeRoute)) {
            return self::$homeRoute;
        }
        return config('app.home') ?: '/';
    }

    /**
     * Validate login request
     *
     * @param Request $request
     * 
     * @return string $identifier Identifier for login user account, such email, username, etc.
     * 
     */
    protected function validateLoginRequest(Request $request)
    {
        $request->validate([
            'username'  => 'required_without_all:email',
            'email'     => 'required_without_all:username',
            'password'  => 'required'
        ]);

        // Default identifier is email
        $identifier = 'email';
        
        if($request->filled('username') && $request->isNotFilled($identifier)) {
            $identifier = 'username';
        }

        return $identifier;
    }
}
