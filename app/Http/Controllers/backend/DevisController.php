<?php

namespace App\Http\Controllers\backend;

use App\Models\Devis;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class DevisController extends Controller
{
    public function index(){
        $devis = Devis::orderBy('created_at', 'desc')->get();
        return view('backend.devis.index', ['devis' => $devis]);
    }
    public function changeStatus(Request $request, $id){
        $devis = Devis::findOrFail($id);
        $devis->update([
            'status' => $request->status,
        ]);
        return redirect()->back()->with('success', 'Status modifié avec succès.');
    }
    public function delete($id){
        $devis = Devis::findOrFail($id);
        $devis->delete();
        return redirect()->back()->with('success', 'Devis supprimé avec succès.');
    }

    public function sendMail(Request $request, $id)
    {
        $devis = Devis::findOrFail($id);

        $details = [
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to($devis->email)->send(new \App\Mail\DevisMail($details));

        return redirect()->back()->with('success', 'Email envoyé avec succès!');
    }
}
