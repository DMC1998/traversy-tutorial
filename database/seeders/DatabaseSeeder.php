<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(6)->create();
        
        $user = User::factory()->create([
            'name' => 'John Doe',
            'email' => 'john@gmail.com'
        ]);

        Listing::factory(5)->create([
            'user_id' => $user->id
        ]);
            

        // Listing::create([
        //     'title' => 'Laravel Senior DEV',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'Acme Corm',
        //     'location' => 'Boston, MA',
        //     'email' => 'email1@gmail.com',
        //     'website' => 'https://www.acme.com',
        //     'description' => 'I am The Blade of the Something that
        //     can do all things og the dahjsv'
        // ]);

        // Listing::create([
        //     'title' => 'Something Sup',
        //     'tags' => 'PHP, javascript, api',
        //     'company' => 'Sup Corp',
        //     'location' => 'Manila, Ph',
        //     'email' => 'email2@gmail.com',
        //     'website' => 'https://www.sup.com',
        //     'description' => 'I am Thehfgh Blade of the Something that
        //     can do all things og thasdadasdasdasdase dahjsv'
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
