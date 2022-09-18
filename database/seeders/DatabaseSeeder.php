<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        Project::truncate();

        //User::factory(10)->create();
        Project::factory(3)->create();

        $polo = User::factory()->create([
             'name' => 'Polo',
             'email' => 'mcd.markensche@gmx.de',
             'password' => '$2y$10$np9lApz..W1VkxuX9bvVCOT6hXLzRzq8oGNFJl8.tQXHiop5Js6Eu',
        ]);

        Project::create([
            'title' => 'Jugend Film Camp',
            'user_id' => $polo->id,
            'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
            'image' => 'https://jugendfilmcamp.de/images/layout/logo-jfc.png',
        ]);

        Project::create([
        'title' => 'Showreel Camp',
        'user_id' =>  $polo->id,
        'description' => 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.',
        'image' => 'https://jugendfilmcamp.de/images/layout/logo-jfc.png',
        ]);
    }
}
