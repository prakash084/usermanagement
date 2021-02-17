<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
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
        user::truncate();
        DB::table('role_user')->truncate();

        $adminrole = Role::where('name','admin')->first();
        $authorrole = Role::where('name','author')->first();
        $userrole = Role::where('name','user')->first();

        $admin = User::create([
        	'name'=>'Admin User',
        	'email'=>'admin@admin.com',
        	'password'=>Hash::make('adminadmin')
        ]);

        $author = User::create([
        	'name'=>'Author User',
        	'email'=>'author@author.com',
        	'password'=>Hash::make('adminadmin')
        ]);

        $user = User::create([
        	'name'=>'Generic User',
        	'email'=>'user@user.com',
        	'password'=>Hash::make('adminadmin')
        ]);


        $admin->roles()->attach($adminrole);
        $author->roles()->attach($authorrole);
        $user->roles()->attach($userrole);

    }
}
