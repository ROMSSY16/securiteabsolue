<?php

namespace App\Http\Controllers\backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    public function index(Request $request){

       $query = Post::query();

       if ($request->has('category') && $request->category != 'All Category') {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('id', $request->category);
            });
        }
        if ($request->has('sort')) {
            if ($request->sort == 'Recent') {
                $query->orderBy('created_at', 'desc');
            } elseif ($request->sort == 'Popular') {
                $query->orderBy('created_at', 'desc');
            }
        }
        $posts = $query->with(['category', 'user'])->get();

        $categories = Category::all();

            return view('backend.blog.index', [
                'posts' => $posts,
                'categories' => $categories,
            ]);
    }
    public function show($id){
        $post = Post::with(['comments.user', 'tags', 'likes', 'user'])->findOrFail($id);

        $comments = $post->comments()->paginate(3);
        return view('backend.blog.show', [
            'post' => $post,
            'comments'=> $comments,
        ]);
    }
    public function edit($id){
        $post = Post::with(['comments.user', 'tags', 'likes', 'user'])->findOrFail($id);
        $categories = Category::all();
        return view('backend.blog.edit', [
            'post' => $post,
            'categories' => $categories,
        ]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        //$post->published = $request->has('published') ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1280,1280)->save('assets/images/blogs/'.$name_gen);
            $blogImage = 'assets/images/blogs/'.$name_gen;
            
            $post->image = $blogImage;
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post modifié avec succès.');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'nullable|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
       // $post->published = $request->has('published') ? 1 : 0;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1280,1280)->save('assets/images/blogs/'.$name_gen);
            $blogImage = 'assets/images/blogs/'.$name_gen;
            
            $post->image = $blogImage;
        }

        $post->save();

        return redirect()->route('admin.blog.index')->with('success', 'Post ajouté avec succès.');
    }
}
