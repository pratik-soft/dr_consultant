<?php

namespace Database\Factories;

use App\Models\Inquiry;
use Illuminate\Database\Eloquent\Factories\Factory;

class InquiryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Inquiry::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'phone' => $this->faker->phoneNumber,
            'subject' => $this->faker->words(3, true),
            'message' => $this->faker->words(10, true),
            'read_status' => 0,
        ];
    }
}
