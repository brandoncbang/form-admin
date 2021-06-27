<?php

namespace Database\Factories;

use App\Models\FormEntryField;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormEntryFieldFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormEntryField::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'value' => $this->faker->text(),
        ];
    }
}
