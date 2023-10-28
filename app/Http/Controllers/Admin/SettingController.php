<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

        return view('admin.subviews.settings.edit')->with('settings', $setting);
    }

    public function update(Request $request)
    {

        $this->validate($request, [
            'phone' => 'required',
            'email' => 'required',
            'text' => 'required',
            'image' => 'nullable|image',
            'whats_app' => 'required',
            'twitter' => 'required',
            'facebook' => 'required',
        ]);

        $setting = Setting::first();
        if (!$setting) {
            $setting = new Setting();

            if ( $request->hasFile('image')  ) {
                $image = $request->image;
                $image_new_name = time() . '.jpg';
                $image->move('uploads/setting', $image_new_name);

                $setting->image = 'uploads/setting/'.$image_new_name;
            }

            $setting->phone = $request->phone;
            $setting->email = $request->email;
            $setting->text = $request->text;
            $setting->text_en = $request->text_en;
            $setting->whats_app = $request->whats_app;
            $setting->twitter = $request->twitter;
            $setting->facebook = $request->facebook;
            $setting->overview_ar = $request->overview_ar;
            $setting->overview_en = $request->overview_en;
            $setting->mission_ar = $request->mission_ar;
            $setting->mission_en = $request->mission_en;
            $setting->vision_ar = $request->vision_ar;
            $setting->vision_en = $request->vision_en;
            $setting->values_ar = $request->values_ar;
            $setting->values_en = $request->values_en;
            $setting->save();


//            flash()->success(trans('admin.editMessageSuccess'));
//            return redirect()->back();
            return redirect()->back()->with('success', 'تم الحفظ بنجاح');
        }

        if ( $request->hasFile('image')  ) {
            $image = $request->image;
            $image_new_name = time() . $image->getClientOriginalName();
            $image->move('uploads/setting', $image_new_name);

            $setting->image = 'uploads/setting/'.$image_new_name;
        }

        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->text = $request->text;
        $setting->text_en = $request->text_en;
        $setting->whats_app = $request->whats_app;
        $setting->twitter = $request->twitter;
        $setting->facebook = $request->facebook;
        $setting->overview_ar = $request->overview_ar;
        $setting->overview_en = $request->overview_en;
        $setting->mission_ar = $request->mission_ar;
        $setting->mission_en = $request->mission_en;
        $setting->vision_ar = $request->vision_ar;
        $setting->vision_en = $request->vision_en;
        $setting->values_ar = $request->values_ar;
        $setting->values_en = $request->values_en;

        $setting->save();

//        flash()->success(trans('admin.editMessageSuccess'));
//        return redirect()->back();
        return redirect()->back()->with('success', 'تم الحفظ بنجاح');

    }
}
