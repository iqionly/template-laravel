<?php

namespace App\Http\Controllers\Admins;

use App\Facades\SettingUtil;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateSettingsRequest;
use App\Models\Setting;
use App\Facades\RouteUtil;
use Illuminate\Http\Request;

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

    public function index(Request $request)
    {
        if($request->expectsJson())
            return response()->json(['result' => SettingUtil::getSettings(), 'navigation' => RouteUtil::routesPref('admins.settings')]);
        return view('admins.settings.index', ['settings' => SettingUtil::getSettings(), 'navigation' => RouteUtil::routesPref('admins.settings'), 'update_config' => $this->update_config]);
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
            if($request->expectsJson())
                return response()->json(['result' => $setting, 'message' => 'Settings Updated']);
            return redirect()->back();
        }
    }
}