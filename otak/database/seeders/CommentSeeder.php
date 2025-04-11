<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $comments = [
            [
                'content' => 'This is a comment on post 1.',
                'user_id' => 1,
                'post_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'This is another comment on post 1.',
                'user_id' => 2,
                'post_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more comments as needed
        ];
        foreach ($comments as $comment) {
            \DB::table('comments')->insert($comment);
        }
        
    }
}
