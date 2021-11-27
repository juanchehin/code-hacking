<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'name'=> str_random(10),
        //     'role_id'=> 2, 
        //     'is_active'=> 1,
        //     'email'=> str_random(10).'@codingfaculty.com',
        //     'password'=> bcrypt('secret')
        // ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();

        factory(App\User::class,10)->create()->each(function($user){
            $user->posts()->save(factory(App\Post::class)->make());
        });

    }
}
