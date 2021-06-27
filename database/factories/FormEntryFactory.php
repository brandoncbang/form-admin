<?php

namespace Database\Factories;

use App\Models\FormEntry;
use Illuminate\Database\Eloquent\Factories\Factory;

class FormEntryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FormEntry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'is_spam' => $this->faker->boolean(25),
            'ip_address' => $this->faker->ipv4(),
            'user_agent' => $this->faker->userAgent(),
        ];
    }
}
