<?php

namespace Database\Factories;

use App\Models\FormEntry;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
            'data' => $this->randomData(),
        ];
    }

    protected function randomData(): array
    {
        $results = [];

        for ($i = 0; $i < random_int(0, 17); $i++) {
            $key = '';
            $key_words = $this->faker->words(random_int(1, 5), true);
            $key_case_random_index = random_int(0, 2);

            $value = null;
            $value_type_random_index = random_int(0, 3); // String, Number, Boolean, & Null

            if ($key_case_random_index === 0) {
                $key = Str::snake($key_words);
            }
            if ($key_case_random_index === 1) {
                $key = Str::camel($key_words);
            }
            if ($key_case_random_index === 2) {
                $key = Str::kebab($key_words);
            }

            if ($value_type_random_index === 0) {
                $value = $this->faker->words(random_int(1, 20), true);
            }
            if ($value_type_random_index === 1) {
                $value = $this->faker->numberBetween(0, 255);
            }
            if ($value_type_random_index === 2) {
                $value = $this->faker->boolean();
            }
            // TODO: Look into nested values with object and array types

            $results[$key] = $value;
        }

        return $results;
    }
}
