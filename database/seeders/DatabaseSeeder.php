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
        // \App\Models\User::factory(10000)->create();
        // \App\Models\Branch::factory(1)->create();
        $this->call([
          /* BranchSeeder::class,
            OrganizationSeeder::class,*/
            DepartmentSeeder::class,
        ]);
    }
}
