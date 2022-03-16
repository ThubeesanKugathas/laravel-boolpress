<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class PostController extends Controller
{   

    protected $postValidation = [
        'title' => 'required|min:5',
        'content' => 'required|min:20',
        'category_id' => 'nullable',
        'tags' => 'nullable'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $categories = Category::all();
        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->postValidation);

        $newPost = new Post();
        $newPost->fill($data);

        $postSlug = Str::slug($newPost->title);

        $existSlug = Post::where('slug', $postSlug)->first();
        $counter = 1;

        while ($existSlug) {
            $newSlug = $postSlug . '-' . $counter;
            $counter++;

            $existSlug = Post::where('slug', $postSlug)->first();

            if(!$existSlug) {
                $postSlug = $newSlug;
            }
            
        }

        $newPost->slug = $postSlug;
        $newPost->user_id = Auth::user()->id;

        $newPost->save();

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)->first();
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $categories = Category::all();
        $tags = Tag::all();

        
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate($this->postValidation);

        $post = Post::findOrFail($id);

        $post->update($data);

        if (key_exists('tags', $data)) {

            $post->tags()->detach();

            $post->tags()->attach($data['tags']);

            // $post->tags()->sync($data['tags']);
        }

        return redirect()->route('admin.posts.show', $post->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
