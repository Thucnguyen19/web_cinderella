<?php

namespace App\Helpers;

use App\Models\Setting;

class Helper
{
    public static function getConfigValueFromSettingTable($configKey)
    {
        $setting = Setting::where('config_key', $configKey)->first();
        if (!empty($setting)) {
            return $setting->config_value;
        }
        return null;
    }
}
