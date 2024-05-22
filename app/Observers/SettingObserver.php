<?php

namespace App\Observers;

use App\Jobs\UpdateEnvironmentJob;
use App\Models\Setting;

class SettingObserver
{
    public function updated(Setting $setting)
    {
        if($setting && $setting->name == 'authorizations') {
            UpdateEnvironmentJob::dispatch([
                'CUST_AUTH_FIELD' => $setting->values->custom_auth_field,
                'CUST_AUTH_PASSWORD' => $setting->values->custom_auth_field_password
            ]);
        }
    }
}
