<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $user = new User();
        $user->name ='Kevin';
        $user->email ='kevinchristopher668@gmail.com';
        $user->password = Hash::make('12345678');
        $user->role_id = 1;
        $user->save();

        $user = new User();
        $user->name ='Kevin';
        $user->email ='kchristopher01@student.ciputra.ac.id';
        $user->password = Hash::make('12345678');
        $user->role_id = 2;
        $user->save();

        $user = new User();
        $user->name ='Kevin';
        $user->email ='test@gmail.com';
        $user->password = Hash::make('12345678');
        $user->role_id = 3;
        $user->save();
    }
}
