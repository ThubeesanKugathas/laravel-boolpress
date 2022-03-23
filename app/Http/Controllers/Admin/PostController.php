<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Traits\SlugGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{   

    use SlugGenerator;

    protected $postValidation = [
        'title' => 'required|min:5',
        'content' => 'required|min:20',
        'category_id' => 'nullable',
        'tags' => 'nullable',
        'image' => 'nullable|image|max:500'
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
        $tags = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
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
        $newPost->slug = $this->generateSlug($data['title']);
        $newPost->user_id = Auth::user()->id;

        if (key_exists('image', $data)) {
            $newPost->image  = Storage::put('postCovers', $data['image']);
        }

        $newPost->save();

        if (key_exists("tags", $data)) {
            $newPost->tags()->attach($data["tags"]);
        }

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
    public function update(Request $request, Post $post)
    {   
        // dd($request->all());

        $data = $request->validate($this->postValidation);

        $post->update($data);
        
        if (key_exists('image', $data)) {
            if($post->image) {
                Storage::delete($post->image);
            }

            $image = Storage::put('postCovers', $data['image']);
            
            $post->image = $image;
            $post->save();
        }
        
        
        if (key_exists('tags', $data) && count($data['tags']) !== 0) {
            
            $post->tags()->detach();
            
            $post->tags()->attach($data['tags']);
            
            // $post->tags()->sync($data['tags']);
            
        } else {
            $post->tags()->sync([]);
        }
        
        // dd($post);

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
        $post->tags()->detach();

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
