<?php

use App\Post;

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Post::class, 10)->create()
        ->each(function($post) {

          $categories = App\Category::inRandomOrder()->take(rand(1,3))->get();
          $post->categories()->attach($categories);

        });
    }
}
