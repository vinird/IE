<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	//  factory(App\User::class, 50)->create()->each(function($u) {
	    //     $u->posts()->save(factory(App\Post::class)->make());
	    // });


        // $this->call(UsersTableSeeder::class);
        // user(App\User::class, 50)->create();
        factory(App\Sede::class, 50)->create();

        DB::table('users')->insert([
            'name' => "Administrador",
            'email' => "admin@admin.com",
            'password' => bcrypt('password'),
            'userType' => 1, 
            'active' => 1,
        ]);

    }
}
