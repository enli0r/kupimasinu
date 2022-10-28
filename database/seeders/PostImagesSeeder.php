<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostImages;
use Illuminate\Database\Seeder;

class PostImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(Post::all() as $post){
            PostImages::create([
                'post_id' => $post->id,
                'link' => 'no-image.jpg'
            ]);
        }
    }
}
