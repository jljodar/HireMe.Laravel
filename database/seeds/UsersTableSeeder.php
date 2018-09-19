<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userJose = DB::table('users')->insert([
            'username' => 'jose',
            'email' => 'jose@jose.com',
            'password' => bcrypt('jose'),
            'name' => 'jose',
        ]);
        
        $userAnne = DB::table('users')->insert([
            'username' => 'anne',
            'email' => 'anne@anne.com',
            'password' => bcrypt('anne'),
            'name' => 'anne',
        ]);

        factory(App\User::class, 1856)->create();

        /* If you would like to do something with every User created, you can do it like this:

        factory(App\User::class, 50)->create();->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
