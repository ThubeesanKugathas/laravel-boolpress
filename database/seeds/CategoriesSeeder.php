<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "categoryName" => "article",
                "categoryDescription" => "divulgation of information about the World"
            ],
            [
                "categoryName" => "vlog/blog",
                "categoryDescription" => "showing daily life doses and experiences"
            ],
            [
                "categoryName" => "reaction",
                "categoryDescription" => "comments of reaction to events"
            ],
            [
                "categoryName" => "fiction",
                "categoryDescription" => "wrinting fictional stories in posts"
            ],
            [
                "categoryName" => "discussion",
                "categoryDescription" => "post with the purpose to discuss about something with others"
            ],
        ];

        foreach ($categories as $category) {
            $newCategory = new Category();

            $newCategory->fill($category);
            $newCategory->save();
        }
    }
}
