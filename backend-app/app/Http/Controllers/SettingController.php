<?php

namespace App\Http\Controllers;

use App\Http\Traits\UploadeImage;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    use UploadeImage;
    public function index(){

        return view('settings.settings');
    }

    public function update(Request $request, Setting $setting){

        //$settings = Setting::create($request->except('logo','favicon','_token'));

        $setting->update($request->except('logo','favicon','_token'));

        if ($request->hasFile('logo')) {
            $setting->update(['logo' => $this->uploadImage($request->file('logo'),'logo')]);
        }
        if ($request->hasFile('favicon')) {
            $setting->update(['favicon' => $this->uploadImage($request->file('favicon'),'favicon')]);
        }

        return redirect()->back();
    }
}
