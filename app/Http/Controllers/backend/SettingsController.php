<?php

namespace App\Http\Controllers\backend;

use App\Models\Settings;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class SettingsController extends Controller
{
    public function index(){
        return view("backend.settings.index");
    }
    public function update(Request $request){
        $settings = Settings::find(1);

        if ($request->hasFile('logo')) {
            $image = $request->file('logo');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(150,150)->save('assets/images/'.$name_gen);
            $logoImage = 'assets/images/'.$name_gen;
 
            $settings->logo = $logoImage;
        }
        $settings->no_telephone = $request->input('no_telephone');
        $settings->no_telephone2 = $request->input('no_telephone2') ?? null;
        $settings->email = $request->input('email');
        $settings->email2 = $request->input('email2');

        $settings->horaires = $request->input('horaires');
        $settings->link_fb = $request->input('link_fb');
        $settings->link_tw = $request->input('link_tw');
        $settings->link_ld = $request->input('link_ld');

        $settings->localisation = $request->input('localisation');
        $settings->longitude = $request->input('longitude');
        $settings->latitude = $request->input('latitude');

        $settings->save();

        return redirect()->back()->with('success', 'Donnée mise à jour avec succès.');
    }
}
