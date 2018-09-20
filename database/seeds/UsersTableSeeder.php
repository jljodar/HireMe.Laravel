<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        // Create my own user for quick testing
        $userJose = DB::table('users')->insert([
            'username' => 'jose',
            'email' => $faker->safeEmail,
            'password' => bcrypt('jose'),
            
            'name' => 'José L.',
            'last_name' => 'Jódar Bornás',
            'address' => $faker->address,
            'city' => $faker->city,
            'country' => 'Spain',
            'postal_code' => $faker->postcode,
            
            'about_me' => "José is a highly talented C#.NET and JavaScript developer with more than ten years of experience in the IT industry. He is passionate about programming and is proficient in multiple programming languages.",

            'profile_visits' => rand(0, 200),
            'last_seen_at' => Carbon::now(),

            'remember_token' => str_random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        factory(App\User::class, 1856)->create();

        /* If you would like to do something with every User created, you can do it like this:

        factory(App\User::class, 50)->create();->each(function ($u) {
            $u->posts()->save(factory(App\Post::class)->make());
        });*/
    }
}
