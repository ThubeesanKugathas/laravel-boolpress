<?php
namespace App\Traits;

use Illuminate\Support\Str;
use App\Post;


trait SlugGenerator {
    protected function generateSlug($postTitle) {

        $slug = Str::slug($postTitle);

        $exists = Post::where("slug", $slug)->first();
        $counter = 1;

        while ($exists) {
            $newSlug = $slug . "-" . $counter;
            $counter++;

            $exists = Post::where("slug", $newSlug)->first();

            if (!$exists) {
            $slug = $newSlug;
            }
        }

        return $slug;
    }
}