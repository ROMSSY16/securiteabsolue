<?php

namespace App\Http\Controllers\backend;

use App\Models\Devis;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        $contacts = Contact::get();
        return view('backend.contact.index', ['contacts' => $contacts]);
    }
    public function deleteContact($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        return redirect()->back()->with('success', 'Contact supprimé avec succès.');
    }
    public function sendMail(Request $request)
    {

        $details = [
            'subject' => $request->subject,
            'message' => $request->message
        ];

        Mail::to($request->address)->send(new \App\Mail\DevisMail($details));

        return redirect()->back()->with('success', 'Email envoyé avec succès!');
    }
}
