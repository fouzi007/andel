<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(EventTableSeeder::class);
         $this->call(WilayasTableSeeder::class);
         $this->call(ArticlesTableSeeder::class);

        \App\SiteSettings::create([
            'featured_event_id' => 1
        ]);
    }
}
