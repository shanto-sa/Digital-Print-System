<?php

namespace App\Http\Controllers;

use App\Models\GeneralSettings;
use App\Models\SystemSettings;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function general_settings_edit()
    {

        if (!request()->user()->can('general-settings-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $general_settings = GeneralSettings::first();
        return view('settings.general_settings', compact('general_settings'));
    }


    public function general_settings_update(Request $request)
    {
        if (!request()->user()->can('general-settings-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $validatedData = $request->validate([
            'site_title' => 'required',
            'site_logo' => 'nullable|mimes:png|max:1024',
            'contact_person' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address_line_1' => 'required',
            'address_line_2' => 'nullable',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required'
        ]);

        $general_settings = GeneralSettings::first();

        $filename = $general_settings->site_logo;


        if ($request->file('site_logo') != null) {
            $site_logo = $request->file('site_logo');
            $filename = 'logo' . '.' . $site_logo->getClientOriginalExtension();
            $site_logo->move(public_path('images/uploads'), $filename);

            $old_logo = $general_settings->site_logo;
            if ($old_logo) {
                $old_logo = public_path('images/uploads/' . $old_logo);

                if (file_exists($old_logo)) {
                    unlink($old_logo);
                }
            }
        }
        $validatedData['site_logo'] = $filename;
        $general_settings->update($validatedData);
        return redirect()->back()->with(Toastr::success('General Settings Updated!'));
    }


    public function system_settings_edit()
    {
        if (!request()->user()->can('system-settings-view')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }
        $system_settings = SystemSettings::first();
        return view('settings.system_settings', compact('system_settings'));
    }


    public function system_settings_update(Request $request)
    {
        if (!request()->user()->can('system-settings-edit')) {
            return redirect()->back()->with(Toastr::error('আপনি অনুমোদিত নন!'));
        }

        $validatedData = $request->validate([
            'date_format' => 'required',
            'time_zone' => 'required',
            'currency_code' => 'required',
            'currency_symbol' => 'required',
            'currency' => 'required',
            'currency_position' => 'required'
        ]);

        SystemSettings::first()->update($validatedData);
        return redirect()->back()->with(Toastr::success('System Settings Updated!'));
    }
}
