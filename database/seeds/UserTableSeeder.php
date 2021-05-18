<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create data user
        $userCreate = User::create([
            'name'      => 'Admin',
            'email'     => 'admin@gmail.com',
            'role_id'     => '1',
            'password'  => bcrypt('admin')
        ]);
        $userCreate = User::create([
            'name'      => 'User',
            'email'     => 'user@gmail.com',
            'role_id'     => '2',
            'password'  => bcrypt('user')
        ]);
    }
}
