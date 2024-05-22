<?php

namespace App\Facades;

use App\Utilities\SettingUtility;
use Illuminate\Support\Facades\Facade;

/**
 * 
 * Facade SettingUtil
 * 
 * @method  static  array getDefaults()
 * @method  static  \Illuminate\Database\Eloquent\Collection getSettings()
 * @method  static  \App\Models\Setting getSetting(string $key)
 * @method  static  object getSettingValue(string $key)
 * @method  static  void setSetting(string $key, array|object $value)
 * @method  static  void setSettingIfNotExists(string $key, array|object $value)
 * 
 * @see \App\Utilities\SettingUtility
 */
class SettingUtil extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */

    protected static function getFacadeAccessor(): string
    {
        return SettingUtility::class;
    }
}