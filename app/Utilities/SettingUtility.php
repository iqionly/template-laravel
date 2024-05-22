<?php

namespace App\Utilities;

use App\Models\Setting;

class SettingUtility
{
    /**
     * Default settings of the application
     */
    const DEFAULTSETTINGS = [
        'authorizations' => [
            'name' => 'authorizations',
            'values' => [
                'custom_auth_field' => 'username',
                'custom_auth_field_password' => 'password',
                'enable_registration' => true,
                'enable_forgot_password' => true,
                'enable_reset_password' => true,
                'enable_change_password' => true,
                'enable_change_email' => true,
                'enable_change_username' => true,
                'enable_delete_account' => true,
            ]
        ],
        'notifications' => [
            'name' => 'notifications',
            'values' => [
                'enable_email_notification' => true,
                'enable_sms_notification' => true,
                'enable_push_notification' => true,
            ]
        ]
    ];

    /**
     * Get the default settings
     *
     * @return array
     * 
     */
    public static function getDefaults()
    {
        return self::DEFAULTSETTINGS;
    }

    /**
     * Get all settings avaiable in database
     *
     * @return \Illuminate\Database\Eloquent\Collection
     * 
     */
    public static function getSettings()
    {
        return Setting::all();
    }

    /**
     * Get setting base from name of key
     *
     * @param string $key name of the setting
     * 
     * @return \App\Models\Setting
     * 
     */
    public static function getSetting(string $key)
    {
        return Setting::where('name', $key)->first();
    }

    /**
     * Get setting value base from name of key
     *
     * @param string $key name of the setting
     * 
     * @return object|array|null
     * 
     */
    public static function getSettingValue(string $key)
    {
        return Setting::where('name', $key)->first()->value;
    }

    /**
     * Set setting value base from name of key
     *
     * @param string $key name of the setting
     * @param object|array $value value of the setting
     * 
     * @return void
     * 
     */
    public static function setSetting(string $key, array|object $value)
    {
        $setting = Setting::where('name', $key)->first();
        $setting->value = $value;
        $setting->save();
    }

    /**
     * Set setting value base from name of key if not exists
     *
     * @param string $key name of the setting
     * @param object|array $value value of the setting
     * 
     * @return void
     * 
     */
    public static function setSettingIfNotExists(string $key, array|object $value)
    {
        Setting::where('name', $key)->firstOrCreate([
            'name' => $key,
        ], [
            'value' => $value,
        ]);
    }
}