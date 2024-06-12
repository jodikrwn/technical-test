<?php

namespace Database\Factories;

use App\Models\Designation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Designation>
 */
class DesignationFactory extends Factory
{
    protected $model = Designation::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'          => $this->faker->company,
            'description'   => $this->faker->paragraph,
            'is_active'     => $this->faker->randomElement([1, 0]),
        ];
    }
}
