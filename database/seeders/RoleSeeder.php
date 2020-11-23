<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = new Role();
        $role->name ='Admin';
        $role->description ='Web Admin';
        $role->save();

        $role = new Role();
        $role->name ='Creator';
        $role->description ='Event Creator';
        $role->save();

        $role = new Role();
        $role->name ='User';
        $role->description ='Normal User';
        $role->save();
    }
}
