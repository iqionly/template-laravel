<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class CustomMacrosProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->registerModelMacro();
    }

    /**
     * Register function macro to Model
     * 
     * @param string $name name of the macro
     * @param callable $callback callback of the macro
     * 
     * @return void
     * 
     */
    private function registerModelMacro(): void
    {
        // Register function macro isFromApi
        // This function will check if the current request is from api or not
        Request::macro('isFromApi', function(string $from = null) {
            /**
             * This to prevent error when calling routeIs method from intellesense
             * @var \Illuminate\Http\Request $this 
             */
            return $this->routeIs($from ?: 'api.*');
        });
    }
}
