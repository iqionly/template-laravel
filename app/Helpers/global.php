<?php

if(!function_exists('checkboxFilter'))
{
    /**
     * Convert checkbox value to boolean or if it not on then return string value, if it not either on or string than false
     *
     * @param mixed $value
     * 
     * @return string|bool
     * 
     */
    function checkboxFilter($value): mixed
    {
        if($value !== 'on' && $value !== null)
        {
            return $value;
        }
        return $value == 'on' || $value == true;
    }
}

if(!function_exists('cutomFieldIdentifier'))
{
    /**
     * Get custom field auth identifier
     *
     * @return string
     * 
     */
    function customFieldIdentifier(): string
    {
        $configField = config('auth.custom_auths.field');
        return $configField;
    }
}

if(!function_exists('customFieldPasswordIdentifier'))
{
    /**
     * Get custom field auth identifier
     *
     * @return string
     * 
     */
    function customFieldPasswordIdentifier(): string
    {
        $configField = config('auth.custom_auths.password');
        return $configField;
    }
}

if(!function_exists('customFieldIdentifierLabel'))
{
    /**
     * Get custom field auth identifier label
     *
     * @return string
     * 
     */
    function customFieldIdentifierLabel(): string
    {
        return ucwords(customFieldIdentifier());
    }
}

if(!function_exists('getBaseClassName'))
{
    /**
     * Get base class name
     *
     * @param mixed $model
     * 
     * @return string
     * 
     */
    function getBaseClassName($model): string
    {
        return strtolower(class_basename($model));
    }
}