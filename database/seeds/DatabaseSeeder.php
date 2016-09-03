<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash; 

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
	    //    $u->posts()->save(factory(App\Post::class)->make());
	    //  });


      // $this->call(UsersTableSeeder::class);
      // user(App\User::class, 50)->create();

        DB::table('users')->insert([
            'name' => "Administrador",
            'email' => "admin@admin.com",
            'password' => bcrypt('password'),
            'userType' => 1,
            'active' => 1,
        ]);
        DB::table('users')->insert([
            'name' => "Invitado",
            'email' => "invitado@invitado.com",
            'password' => bcrypt('password'),
            'active' => 1,
        ]);
        DB::table('tokens')->insert([
            'token' => Hash::make("informatica2016"),
        ]);
        // DB::table('users')->insert([
        //     'name' => "Invitado2",
        //     'email' => "admin@admin.commm",
        //     'password' => bcrypt('password'),
        //     'active' => 1,
        // ]);
        DB::table('slide_images')->insert([
            'url' => '1.jpeg',
            'icon' => '1.jpeg',
            'user' => 1,
        ]);
        DB::table('slide_images')->insert([
            'url' => '2.jpg',
            'icon' => '2.jpg',
            'user' => 1,
        ]);
        DB::table('slide_images')->insert([
            'url' => '3.jpg',
            'icon' => '3.jpg',
            'user' => 1,
        ]);

        DB::table('sedes')->insert([
            'name' => "Turrialba",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15721.639810408007!2d-83.67906114973887!3d9.899773177644093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0d42417bc6851%3A0xd2ae13fcaa9ce072!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461559646716" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Puntarenas",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7858.903892690256!2d-84.81089384045744!3d9.979475521599378!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0x617ab3a3e72c0d8f!2sUniversidad+de+Costa+Rica%2C+Sede+Pac%C3%ADfico!5e0!3m2!1ses-419!2scr!4v1461556238601" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Guápiles",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31413.306858782344!2d-83.78705440086618!3d10.20796927497937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0b81ac8999b1d%3A0x1f1fd155efac4a9d!2sUniversidad+de+Costa+Rica+Recinto+de+Gu%C3%A1piles!5e0!3m2!1ses-419!2scr!4v1461638779514" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Limón",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31435.64270873805!2d-83.07160899094528!3d9.979194411762354!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa7053ee9e58915%3A0x8258c3f42eb0a521!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639863631" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "San Ramón",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15712.716292763325!2d-84.48836224739787!3d10.084408883147402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0000000000000000%3A0xb205ea7de0c2bb41!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639205655" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Liberia",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15686.105464010838!2d-85.46759586118002!3d10.616155294094824!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f757d1636b1ee43%3A0x5d04110e14abc710!2sUCR!5e0!3m2!1ses-419!2scr!4v1461639316082" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Paraíso",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15725.12885002685!2d-83.87788478459672!3d9.826648008048751!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa120959a749de5%3A0xa7ec6a4fddf52b99!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639399026" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Tacares",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31428.82350223725!2d-84.31752317316916!3d10.049586687139135!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa0583b4aa86197%3A0x5161d0f3c3e42df!2sUCR!5e0!3m2!1ses-419!2scr!4v1461639559829" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);
        DB::table('sedes')->insert([
            'name' => "Golfito",
            'link' => '<iframe class="col-sx-12" id="col-map" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15778.181169639245!2d-83.17555011992717!3d8.639574714499668!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8fa443824f447c0d%3A0x1c5a1d999b58ba82!2sUniversidad+de+Costa+Rica!5e0!3m2!1ses-419!2scr!4v1461639702039" width="100%" height="70%" frameborder="0" style="border:0" allowfullscreen ></iframe>',
        ]);


        DB::table('log_users')->insert([
            'count' => 0,
        ]);

        // factory(App\Mensaje::class, 125)->create();

        // factory(App\Noticia::class, 250)->create();

        // factory(App\Evento::class, 250)->create();

    }
}
