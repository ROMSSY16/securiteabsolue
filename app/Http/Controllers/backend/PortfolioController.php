<?php

namespace App\Http\Controllers\backend;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::all();
        return view('backend.portfolio.index', compact('portfolios'));
    }

    public function create()
    {
        return view('backend.portfolio.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/portfolio/'.$name_gen);
            $save_url = 'assets/images/portfolio/'.$name_gen; 
        }

        Portfolio::create([
            'title' => $request->title,
            'image' => $save_url ?? null,
            'description' => $request->description,
            'category' => $request->category,
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio ajouté avec succès.');
    }

    public function edit($id)
    {
        return view('backend.portfolio.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $request->validate([
            'title' => 'required',
            'image' => 'nullable|image',
            'description' => 'required',
            'category' => 'required',
        ]);

        if($request->hasFile('image')){
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(2879,1363)->save('assets/images/portfolio/'.$name_gen);
            $save_url = 'assets/images/portfolio/'.$name_gen; 
        }

        $portfolio->update([
            'title' => $request->title, 
            'description' => $request->description,
            'category' => $request->category,
            'image' => $save_url ?? $portfolio->image
        ]);

        return redirect()->route('admin.portfolio.index')->with('success', 'Projet modifié avec succès.');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('success', 'Portfolio supprimé avec succès.');
    }
}
