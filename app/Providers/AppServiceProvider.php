<?php

namespace App\Providers;

use App\Models\Profile;
use App\Models\User;
use App\Rules\CheckboxValidationOnOffRule;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->registerClasses();

        $this->registerGateWebRoute();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->forceUrlSchemeApp();
    }

    private function registerClasses(): void
    {
        // Register the SettingUtility class
        $this->app->bind('setting-utility', function() {
            return new \App\Utilities\SettingUtility();
        });
    }

    /**
     * Setting default root app to base APP_URL, and the scheme
     * 
     * this is useful for when create route() and asset() helper, base by APP_URL .env
     * why do this? because when we use route() or asset() helper, it will use current request url and scheme. But this is not what we want.
     *
     * @return void
     * 
     */
    private function forceUrlSchemeApp(): void
    {
        // get url from config
        $url_app = config('app.url');
        // Get the scheme from string $url_app provieded by config('app.url')
        $scheme = parse_url($url_app, PHP_URL_SCHEME);

        // Force the root url and scheme
        app('url')->forceRootUrl($url_app);
        app('url')->forceScheme($scheme);
    }

    private function registerGateWebRoute(): void
    {
        Gate::define('update-profile', function(User $user, Profile $profile) {
            return $user->id === $profile->user_id;
        });
    }

    private function customRuleValidator(): void
    {
        Validator::extend('check', function() {
            return new CheckboxValidationOnOffRule();
        });
    }
}
