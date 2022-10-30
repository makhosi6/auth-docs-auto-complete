<?php

namespace Database\Factories;

use App\Models\Tokens;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Tokens>
 */
class TokensFactory extends Factory
{
       /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Tokens::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
                'uuky' => $this->faker->uuid(),
                'token' => Str::random(20),
                'key' => $this->faker->numberBetween(1, 45900),
        ];
    }
}
