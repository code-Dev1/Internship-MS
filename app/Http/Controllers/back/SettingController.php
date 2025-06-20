<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\File;

class SettingController extends Controller
{
    public function index()
    {
        $count = Setting::count('id');
        if ($count >= 1) {
            $setting = Setting::find(1);
            return view('admin.setting.setting')->with('setting', $setting);
        }
        return view('admin.setting.setting');
    }

    public function store(Request $request)
    {

        $setting = Setting::count('id');
        if ($setting === 1) {
            $test = self::update($request);
            if ($test === 'success') {
                Session::flash('success', 'Setting successfully updated');
                return redirect()->back();
            }
        }

        $request->validate([
            'frontLogo' => [
                'required',
                File::types(['jpg', 'jpeg', 'png'])
                    ->max(1024 * 10)
            ],
            'dashboardLogo' => [
                'required',
                File::types(['jpg', 'jpeg', 'png'])
                    ->max(1024 * 10)
            ],
            'facebook' => ['required', 'url'],
            'youtube' => ['required', 'url'],
            'x' => ['required', 'url'],
            'instagram' => ['required', 'url'],
            'email' => ['required', 'email'],
            'about' => 'required|string'
        ]);
        if ($request->has('frontLogo')) {
            $file1 = $request->file('frontLogo');
            $new_name1 = time() . '_' . $file1->getClientOriginalName();
            $file_path1 = $file1->move('upload\\setting', $new_name1);
        }
        if ($request->has('dashboardLogo')) {
            $file2 = $request->file('dashboardLogo');
            $new_name2 = time() . '_' . $file2->getClientOriginalName();
            $file_path2 = $file2->move('upload\\setting', $new_name2);
        }

        Setting::create([
            'frontLogo' => $file_path1,
            'dashboardLogo' => $file_path2,
            'facebook' => $request->facebook,
            'x' => $request->x,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'email' => $request->email,
            'about' => $request->about
        ]);
        Session::flash('success', 'Setting successfully added');
        return redirect()->back();
    }



    public function update($request)
    {
        $setting = Setting::findOrFail('1');
        $request->validate([
            'frontLogo' => [
                File::types(['jpg', 'jpeg', 'png'])
                    ->max(1024 * 10)
            ],
            'dashboardLogo' => [
                File::types(['jpg', 'jpeg', 'png'])
                    ->max(1024 * 10)
            ],
            'facebook' => ['url'],
            'youtube' => ['url'],
            'x' => ['url'],
            'instagram' => ['url'],
            'email' => ['email'],
            'about' => 'string'
        ]);
        if ($request->has('frontLogo')) {
            @unlink($setting->frontLogo);
            $file1 = $request->file('frontLogo');
            $new_name1 = time() . '_' . $file1->getClientOriginalName();
            $file_path1 = $file1->move('upload\\setting', $new_name1);
        }
        if ($request->has('dashboardLogo')) {
            @unlink($setting->dashboardLogo);
            $file2 = $request->file('dashboardLogo');
            $new_name2 = time() . '_' . $file2->getClientOriginalName();
            $file_path2 = $file2->move('upload\\setting', $new_name2);
        }

        if (isset($file_path1)) {
            $setting->frontLogo = $file_path1;
        }
        if (isset($file_path2)) {
            $setting->dashboardLogo = $file_path2;
        }

        $setting->facebook = $request->facebook;
        $setting->x = $request->x;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->email = $request->email;
        $setting->about = $request->about;
        $setting->save();
        return 'success';
    }
}
