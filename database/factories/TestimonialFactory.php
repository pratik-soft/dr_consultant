<?php

namespace Database\Factories;

use App\Models\Testimonial;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestimonialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Testimonial::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'fullname' => $this->faker->name,
            'review' => $this->faker->text,
            'position_id' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
