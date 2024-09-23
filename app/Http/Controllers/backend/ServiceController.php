<?php

namespace App\Http\Controllers\backend;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('backend.services.index', compact('services'));
    }

    public function create()
    {
        return view('backend.services.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(2879,1363)->save('assets/images/services/'.$name_gen);
        $save_url = 'assets/images/services/'.$name_gen; 

        Service::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $save_url
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service enregistré avec succès.');
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return view('backend.services.show', compact('service'));
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('services.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/services/'.$name_gen);
            $save_url = 'assets/images/services/'.$name_gen; 
        }
        $service->update([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $save_url ?? $service->image,
        ]);

        return redirect()->route('admin.service.index')->with('success', 'Service modifié avec succès.');
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return redirect()->route('admin.service.index');
    }
}
