<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = [
            [
                'title' => 'Los momentos mas terrorificos de la serie One piece',
                'content' => 'This is the content of post 1.',
                'user_id' => 1,
                'contenido' => 'One piece',
                'categoria_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Boruto es un anime increíble',
                'content' => 'This is the content of post 2.',
                'user_id' => 2,
                'contenido' => 'Boruto',
                'categoria_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more posts as needed
        ];
        foreach ($posts as $post) {
            \DB::table('posts')->insert($post);
        }
    }
}
