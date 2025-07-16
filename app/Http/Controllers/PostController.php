<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
       return Inertia::render('posts/listar', [
            'posts' => $posts,
        ]);
    }

    public function create()
    {
        return view('create');
    }

public function store(Request $request)
{
    DB::beginTransaction();

    
    try {
        $request->validate([
            'title' => 'max:255',
            'body' => 'required|string',
            'image' => 'required',
        ]);

        $request['user_id'] = 2;

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => $request['user_id'],
        ]);

        if ($request->hasFile('image')) {
            $imageFile = $request->file('image');
            $path = $imageFile->store('images', 'public');
            $url = asset('storage/' . $path);

            $post->images()->create([
                'url' => $url, 
                'imageable_id' => $post->id,
                'imageable_type' => Post::class,
            ]);
        }


        DB::commit();


        return redirect()->route('posts.index');
    } catch (\Exception $e) {


        DB::rollBack();


        return response()->json([
            'error' => 'Error al crear el post: ' . $e->getMessage(),
        ], Response::HTTP_INTERNAL_SERVER_ERROR);
    }
}

}