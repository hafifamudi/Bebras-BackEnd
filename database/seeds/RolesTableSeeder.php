<?php

use App\Role as AppRole;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = AppRole::create([
            'name' => 'admin'
        ]);
        $role = AppRole::create([
            'name' => 'user'
        ]);
    }
}
