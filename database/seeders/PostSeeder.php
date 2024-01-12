<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $post = Post::factory(300)->create();
        
        foreach ($post as $p) {
            Image::factory(1)->create([
                'imageable_id' => $p->id,
                'imageable_type' => Post::class
            ]);

            $p->tags()->attach([
                rand(1,4),
                rand(5,8)
            ]);
        }
    }
}
