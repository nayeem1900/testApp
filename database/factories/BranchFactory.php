<?php

namespace Database\Factories;

use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class BranchFactory extends Factory
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

        return [
            'organization_unique_id' => $organizations[Arr::random($random)]->unique_id,
            'unique_id' => $this->faker->unique()->randomNumber(8, false), // 79907610 unique_id,
            'name' => $this->faker->streetName,
            'address' => $this->faker->streetAddress,
            'email' => $this->faker->unique()->safeEmail(),
            'mob_no' => "01".rand(3,9).rand(11111111,99999999),
            'status' => Arr::random($random),
            'description' => $this->faker->realText(200, 2),
            'created_by' => 1,
            'updated_by' => 1
        ];
    }
}
