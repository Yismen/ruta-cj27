<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new App\User;

        $user->name = "Yismen Jorge";
        $user->email = "yismen.jorge@gmail.com";
        $user->password = Hash::make("jimmagic32");

        $user->save();
    }
}
