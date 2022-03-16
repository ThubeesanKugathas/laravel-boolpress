<?php

use App\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'food',
            'daily_life',
            'science',
            'hobby',
            'love',
            'family'
        ];

        foreach ($tags as $tag) {
            $newTag = new Tag();

            $newTag->tag_name = $tag;
            $newTag->slug = Str::slug($tag);
            $newTag->save();

        }
    }
}
