<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {



        return [

            'unique_id' => Str::random(10),
            'name' => Str::random(10),
            'status' =>$this->faker->numberBetween(0,1),
            'description'=>$this->faker->text(10),
            'created_by' => 1,
            'updated_by' => 1




        ];
    }
}
