<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'ProductOwner']);
        Role::create(['name' => 'Developer']);
        Role::create(['name' => 'DevOps']);
        Role::create(['name' => 'Quality']);
    }
}
