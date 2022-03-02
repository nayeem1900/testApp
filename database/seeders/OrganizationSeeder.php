<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

   $organization=[

        [
            'unique_id' => Str::random(10),
            'name' => Str::random(10),
            'status' => 1,
            'description'=>'descripiton one',
            'created_by' => 1,
            'updated_by' => 1,
        ],
       [
           'unique_id' => Str::random(10),
           'name' => Str::random(10),
           'status' => 0,
           'description'=>'descripiton one',
           'created_by' => 1,
           'updated_by' => 1,
       ]

   ];

Organization::insert($organization);

        return Branch::factory()->count(1000)->create();

    /*    return Organization::factory()->count(1000)->create();*/



    }
}
