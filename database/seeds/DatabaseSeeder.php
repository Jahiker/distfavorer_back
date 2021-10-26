<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $user = new User();

        $user->name = 'Administrador';
        $user->email = 'admin@email.com';
        $user->password = bcrypt('12345678');
        $user->role = 'admin';

        $user->save();
    }
}
