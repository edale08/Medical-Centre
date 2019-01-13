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
      // here we create a user
      $user = new User();
      $user->name = 'Mary';
      $user->email = 'mary@example.com';
      $user->password = bcrypt('secret');
      $user->save();
    }
}
