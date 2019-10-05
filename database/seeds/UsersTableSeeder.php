<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();

        // getting the roles to attact it to the user
        $adminRole = Role::where('name', 'Admin')->first();
        $managerRole = Role::where('name', 'Manager')->first();
        $front_deskRole = Role::where('name', 'Front Desk')->first();
    	
    	$admin = User::create([
    		'name'=>'Admin',
    		'email'=>'admin@mycota.com',
    		'password'=>bcrypt('00mohamed')
    	]);

    	$manager = User::create([
    		'name'=>'Manager',
    		'email'=>'manager@mycota.com',
    		'password'=>bcrypt('00mohamed')
    	]);

    	$frontdesk = User::create([
    		'name'=>'Front Desk',
    		'email'=>'frontdesk@mycota.com',
    		'password'=>bcrypt('00mohamed')
    	]);


    	$admin->roles()->attach($adminRole);
    	$manager->roles()->attach($managerRole);
    	$frontdesk->roles()->attach($front_deskRole);

        factory(App\User::class, 0)->create();
    }
}
