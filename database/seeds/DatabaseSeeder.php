<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\User;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['name' => 'superadmin']);

        DB::table('users')->insert([
            'name' => 'Superadmin',
            'email' => 'admin@superadmin.com',
            'password' => Hash::make('password'),
            
        ]);

        $admin = User::where('name','Superadmin')->first();
        $role= Role::where('name','superadmin')->first();
        $admin->assignRole($role);
    }
}
