<?php

namespace App\Facades;

use App\Utilities\RouteUtility;
use Illuminate\Support\Facades\Facade;

/**
 * 
 * Facade RouteUtil
 * 
 * @see \App\Utilities\RouteUtility
 */
class RouteUtil extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */

    protected static function getFacadeAccessor(): string
    {
        return RouteUtility::class;
    }
}