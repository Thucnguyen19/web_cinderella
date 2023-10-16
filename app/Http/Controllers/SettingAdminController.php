<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SettingAdminController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index', compact('settings'));
    }
    public function create()
    {
        return view('admin.setting.add');
    }
    public function store(SettingAddRequest $request)
    {
        try {
            // $type = request()->get('type'); // Lấy giá trị 'type' từ URL
            $dataInsertSetting = [
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type
            ];
            // dd($dataInsertSetting);
            $this->setting->create($dataInsertSetting);
            return redirect()->route('settings.index');
        } catch (Exception $exception) {
            Log::error(message: 'Erro:' . $exception->getMessage() . '----Line:' . $exception->getLine());
        }
    }
    public function edit($id)
    {
        $settings = $this->setting->find($id);
        return view('admin.setting.edit', compact('settings'));
    }
    public function update(Request $request, $id)
    {

        $dataInsertSetting = [
            'config_key' => $request->config_key,
            'config_value' => $request->config_value,
            'type' => $request->type
        ];
        // dd($dataInsertSetting);
        $this->setting->find($id)->update($dataInsertSetting);
        return redirect()->route('settings.index');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
