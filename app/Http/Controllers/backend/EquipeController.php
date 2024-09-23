<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    public function index(){
        $personnels = User::where('status', '1')->get();
        return view('backend.personnel.index', ['personnels' => $personnels]);
    }
}
