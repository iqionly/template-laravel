<?php

namespace App\Http\Controllers\Admins;

use App\Facades\SettingUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    private array $defaultSettings;
    private array $urls;
    private string $update_config;
    private $app;

    public function __construct()
    {
        $this->app = app();
        $this->urls = [
            'index' => 'admins.settings.index',
            'store' => 'admins.settings.store',
        ];
        $this->defaultSettings = SettingUtil::getDefaults();
        $this->update_config = route('admins.settings.update-config');
    }

    public function index()
    {
        return view('admins.settings.index', ['settings' => SettingUtil::getSettings(), 'update_config' => $this->update_config]);
    }

    public function store(UpdateSettingsRequest $request)
    {
        $key_fillable = UpdateSettingsRequest::DEFAULTFILLABLE;

        $arraySubmit = $request->only(array_keys($key_fillable));

        $result = array_merge($key_fillable, $arraySubmit);

        $result = array_map(function($item){
            return checkboxFilter($item);
        }, $result);

        $setting = Setting::findName($request->settings);

        $setting->values = $result;

        if($setting->save())
        {
            return redirect()->back();
        }
    }
}