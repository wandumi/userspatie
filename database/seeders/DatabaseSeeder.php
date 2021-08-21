<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Roles to be done before the users
        $this->call([
            RolesAndPermissionsSeeder::class,
            UserTableSeeder::class,
            LocaleSeeder::class,
            ProfileSeeder::class,
        ]);
    }
}
