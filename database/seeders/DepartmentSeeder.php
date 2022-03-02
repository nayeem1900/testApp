<?php

namespace Database\Seeders;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        return Department::factory()->count(1000)->create();


        /*$random = [0, 1];
        $organizations = Organization::get('unique_id');
        $branches = Branch::get('unique_id');

        DB::table('departments')->insert([

            'unique_id' => Str::random(10),
            'organization_unique_id' =>$organizations[Arr::random($random)]->unique_id,
            'branch_unique_id' =>$branches[Arr::random($random)]->unique_id,
            'name' => Str::random(10),
            'status' => Arr::random($random),
            'description' =>"descripiton one",
            'created_by' => 1,
            'updated_by' => 1,
        ]);*/

    }
}
