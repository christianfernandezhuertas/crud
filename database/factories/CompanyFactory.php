<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;
    private static $order = 1;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vat_number' => $this->faker->bothify('ES########?'),
            'name' => $this->faker->company(),
            'image' => 'company'. self::$order++ . '.png',
            'public' => $this->faker->boolean(),
        ];
    }
}
