<?php

use Illuminate\Database\Seeder;
use App\Role;


class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Role::truncate();

       Role::create(['name'=>'Admin']);
       Role::create(['name'=>'Manager']);
       Role::create(['name'=>'Front Desk']);
    }
}
