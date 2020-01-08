<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = \App\Role::create([
            'name' => 'admin',
            'description' => 'Administrateur Système'
        ]);
        \App\Role::create([
            'name' => 'medecin',
            'description' => 'Médecin'
        ]);
        \App\Role::create([
            'name' => 'manager',
            'description' => 'Manager'
        ]);
        \App\Role::create([
            'name' => 'labo',
            'description' => 'Laboratoire'
        ]);
        \App\Role::create([
            'name' => 'agence',
            'description' => 'Agence'
        ]);
        User::create([
          'nom' => 'Noual',
          'prenom' => 'Fawzi',
          'wilaya_id' => 16,
          'email' => 'fouzi.noual@gmail.com',
          'date_naissance' => \Carbon\Carbon::parse('1991-08-28'),
          'email_verified_at' => now(),
          'telephone' => '0540781136',
          'password' => bcrypt('fnoual123'),
          'role_id' => $admin->id
        ]);
    }
}
