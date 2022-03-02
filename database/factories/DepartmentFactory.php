<?php

namespace Database\Factories;

use App\Models\Branch;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random = [0, 1];
        $organizations = Organization::get('unique_id');
        $branches = Branch::get('unique_id');
        return [
            //

            'unique_id' => $this->faker->unique()->randomNumber(8, false),
            'organization_unique_id' =>$organizations[Arr::random($random)]->unique_id,
            'branch_unique_id' =>$branches[Arr::random($random)]->unique_id,
            'name' => Str::random(10),
            'status' => Arr::random($random),
            'description' => $this->faker->realText(200, 2),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
