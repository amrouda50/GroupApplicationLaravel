<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\group;

class GroupFactory extends Factory
{
    protected $model = group::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name,
            'description' => $this->faker->text
        ];
    }
}
