<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\AuthenticateWithBasicAuth;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

class AuthenticateWithBasicAuthApp extends AuthenticateWithBasicAuth
{
    /**
     * The configuration of basic auth custom.
     *
     * @var array
     */
    protected $config;

    public function __construct(AuthFactory $auth)
    {
        parent::__construct($auth);

        $this->config = config('auth.custom_auths');
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @param  string|null  $field
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException
     */
    public function handle($request, Closure $next, $guard = null, $field = null)
    {
        $this->auth->guard($guard)->basic($this->config['field']);

        return $next($request);
    }
}
