<?php

namespace App\Http\Controllers\backend;

use App\Models\Apparence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ApparenceController extends Controller
{
    public function index(){
        $apparence = Apparence::all();
        return view("backend.apparence.index",compact("apparence"));
    }
    public function update(Request $request)
    {
        $apparence = Apparence::find(1);

        // Upload des images
        if ($request->hasFile('slide1_image')) {
            $image = $request->file('slide1_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,850)->save('assets/images/slides/'.$name_gen);
            $slide1Image = 'assets/images/slides/'.$name_gen;
 
            $apparence->slide1_image = $slide1Image;
        }
        if ($request->hasFile('slide2_image')) {
            $image = $request->file('slide2_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,850)->save('assets/images/slides/'.$name_gen);
            $slide2Image = 'assets/images/slides/'.$name_gen;
 
            $apparence->slide2_image = $slide2Image;
        }
        if ($request->hasFile('slide3_image')) {
            $image = $request->file('slide3_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1920,850)->save('assets/images/slides/'.$name_gen);
            $slide3Image = 'assets/images/slides/'.$name_gen;
 
            $apparence->slide3_image = $slide3Image;
        }
        if ($request->hasFile('image_atout')) {
            $image = $request->file('image_atout');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/'.$name_gen);
            $imageAtout = 'assets/images/'.$name_gen;
 
            $apparence->image_atout = $imageAtout;
        }
        if ($request->hasFile('image_bg')) {
            $image = $request->file('image_bg');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/'.$name_gen);
            $imageBg = 'assets/images/'.$name_gen;

            $apparence->image_bg = $imageBg;
        }
        if ($request->hasFile('video_image')) {
            $image = $request->file('video_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/'.$name_gen);
            $videoImage = 'assets/images/'.$name_gen;

            $apparence->video_image = $videoImage;
        }

        // Mettre à jour les autres champs
        $apparence->slide1_titre = $request->input('slide1_titre');
        $apparence->slide1_description = $request->input('slide1_description');
        $apparence->slide1_button_title = $request->input('slide1_button_titre');
        $apparence->slide1_button_link = $request->input('slide1_button_link');

        $apparence->slide2_titre = $request->input('slide2_titre');
        $apparence->slide2_description = $request->input('slide2_description');
        $apparence->slide2_button_title = $request->input('slide2_button_titre');
        $apparence->slide2_button_link = $request->input('slide2_button_link');

        $apparence->slide3_titre = $request->input('slide3_titre');
        $apparence->slide3_description = $request->input('slide3_description');
        $apparence->slide3_button_title = $request->input('slide3_button_titre');
        $apparence->slide3_button_link = $request->input('slide3_button_link');

        $apparence->video_link = $request->input('video_link');

        // Enregistrer les modifications
        $apparence->save();

        return redirect()->back()->with('success', 'Donnée mise à jour avec succès.');
    }

}
