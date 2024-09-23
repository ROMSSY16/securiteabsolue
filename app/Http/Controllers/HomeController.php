<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Devis;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Category;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home(){
        $portfolios = Portfolio::all();
        $categories = Portfolio::select('category')->distinct()->get();
        $posts = Post::with(['comments.user', 'tags', 'likes', 'user'])->get();
        return view('home', [
            'posts'=> $posts,
            'portfolios' => $portfolios,
            'categories' => $categories,
        ]);
    }
    
    public function blog(){
        $pagetitle = 'Blog/Actualités';
        $posts = Post::with(['comments.user', 'tags', 'likes', 'user'])->orderBy('created_at', 'desc')->paginate(4);
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        $recentsposts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $tags = Tag::orderBy('created_at', 'desc')->limit(6)->get();
        return view('blog', [
            'posts' => $posts,
            'categories' => $categories,
            'recentsposts' => $recentsposts,
            'tags' => $tags, 
            'pagetitle' => $pagetitle,
        ]);
    }
    public function contact(){
        $pagetitle = 'Contact';
        return view('contact' ,[
            'pagetitle' => $pagetitle,
        ]);
    }
    public function portefeuille(){
        $portfolios = Portfolio::all();
        $categories = Portfolio::select('category')->distinct()->get();
        $pagetitle = 'Portefeuille projets ';
        return view('portefeuille', [
            'portfolios' => $portfolios,
            'categories' => $categories,
            'pagetitle' => $pagetitle,
        ]);
    }
    

    public function serviceDetail($id){
        $service = getServiceById($id);
        $services = Service::get();
        $pagetitle = 'Détail ' .$service->name;
        return view('service_detail',[
            'service' => $service,
            'allservices' => $services,
            'pagetitle' => $pagetitle,
        ]);
    }
    public function blogDetail($id){
        
        $post = Post::findOrFail($id);
        $categories = Category::orderBy('created_at', 'desc')->limit(4)->get();
        $recentsposts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        $tags = Tag::orderBy('created_at', 'desc')->limit(6)->get();
        $pagetitle = 'Détail ' .$post->title;
        return view('blog_detail', [
            'post' => $post,
            'categories' => $categories,
            'recentsposts' => $recentsposts,
            'tags' => $tags,
            'pagetitle' => $pagetitle,
        ]);
    }
    public function portfolioDetail($id){
        $portfolio = Portfolio::findOrFail($id);
        $pagetitle = 'Détail ' .$portfolio->title;
        $projets = Portfolio::orderBy('created_at', 'desc')->limit(3)->get();
        return view('portefeuille_detail', [
            'portfolio' => $portfolio,
            'projets' => $projets,
            'pagetitle' => $pagetitle,
        ]);
    }

    public function demandeDevis(){
        $pagetitle = 'Demande de dévis ';
        return view('demande_devis', [
            'pagetitle' => $pagetitle,
        ]);
    }

    public function storeDemandeDevis(Request $request){

        $request->validate([
            'fullname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'nullable|email',
            'service' => 'nullable',
            'comment' => 'nullable', 
        ]);
       
        $devis = Devis::create([
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'email' => $request->email ?? null,
            'service_id' => $request->service ?? null,
            'comment' => $request->comment ?? null,
        ]);

        if($request->email){
            Mail::send('email.devis', ['devis' => $devis], function ($message) use ($devis) {
                $message->to($devis->email); 
                $message->subject('Demande de devis');
            });
        }
        
        Mail::send('email.admin.devis', ['devis' => $devis], function ($message) use ($devis) {
            $message->to("kyliansoro@gmail.com");
            $message->subject('Demande de devis');
        });

        return redirect()->back()->with('success', 'Dévis envoyé avec succès.');
    }

    public function contactStore(Request $request){

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|email|max:255',
            'phone' => 'required|string|max:15',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:500',
        ]);

        Contact::create($data);

        return redirect()->back()->with('success', 'Votre message a été envoyé et enregistré avec succès!');
    }
}
