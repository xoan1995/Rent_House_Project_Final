<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new \App\Comment();
        $comment->user_id = 1;
        $comment->house_id = 1;
        $comment->content = 'Good!';
        $comment->save();

        $comment = new \App\Comment();
        $comment->user_id = 1;
        $comment->house_id = 2;
        $comment->content = 'Like!';
        $comment->save();

        $comment = new \App\Comment();
        $comment->user_id = 1;
        $comment->house_id = 2;
        $comment->content = 'Beautiful!';
        $comment->save();
    }
}
