<?php

namespace Database\Factories;

use App\Models\Form;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Form::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => rtrim($this->faker->sentence(), '. '),
            'success_url' => $this->faker->boolean() ? $this->faker->safeEmail() : null,
            'honeypot_field' => $this->faker->word(),
        ];
    }
}
