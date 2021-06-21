<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'company_id' => $this->faker->numberBetween(1, 23),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'job' => $this->faker->randomElement(['a', 'b', 'c', 'd', 'e'])
        ];
    }
}
