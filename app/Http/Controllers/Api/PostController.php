<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use App\Traits\SlugGenerator;

class PostController extends Controller {
    use SlugGenerator;

    protected $postValidation = [
        'title' => 'required|min:5',
        'content' => 'required|min:20',
        'category_id' => 'nullable',
        'tags' => 'nullable',
        'image' => 'nullable'
    ];

    public function index() {
        $posts = Post::all();

        $posts->load('user', 'category', 'tags');

        // return response()->json([
        //     'response' => 'okay',
        //     'requestDate' => now(),
        //     'data' => $posts
        // ]);

        return response()->json($posts);
    }

    public function store(Request $request) {
        $data = $request->validate($this->postValidation);

        $newPost = new Post();
        $newPost->fill($data);
        $newPost->user_id = 2;
        $newPost->slug = $this->generateSlug($data['title']);
        $newPost->save();

        if(key_exists("tags", $data)){
            $newPost->tags()->attach($data["tags"]);
        }

        return response()->json($newPost);
    }

    public function show(Post $post) {

        // $post = Post::where("id", $id)->with(["tags", "user", "category"])->first(); NON INJECTION
       
        $post->load("tags", "user", "category");

        return response()->json($post);
    }
}