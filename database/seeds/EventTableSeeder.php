<?php

use Illuminate\Database\Seeder;
use App\Event;
class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'nom' => 'Congrès Annuel',
            'slug' => \Illuminate\Support\Str::slug('Congrès Annuel'),
            'description' => 'Exemple',
            'is_active' => 1,
            'lieu' => 'Sheraton Oran',
            'coordonnes' => null,
            'date_start' => now()->addMonths(3),
            'date_end' => now()->addmonths(4),
            'created_by_id' => 1,
        ]);
    }
}
