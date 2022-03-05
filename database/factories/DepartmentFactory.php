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
        $oRandom = [0, 1];
        $organizations = Organization::get('unique_id');
        $bRandom = [0, 999];
        $branches = Branch::get('unique_id');
        return [
            //

            'unique_id' => rand(1111111,9999999),
            'organization_unique_id' =>$organizations[Arr::random($oRandom)]->unique_id,
            'branch_unique_id' =>$branches[Arr::random($bRandom)]->unique_id,
            'name' => Str::random(10),
            'status' => Arr::random($oRandom),
            'description' => $this->faker->realText(200, 2),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}
