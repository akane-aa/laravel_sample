<?php // database/seeds/ArticlesTableSeeder.php

use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('articles')->delete();
        $user = App\User::first();

        factory(App\Article::class, 20)->create([ // 修正
            'user_id' => $user->id,
        ]);
    }
}
