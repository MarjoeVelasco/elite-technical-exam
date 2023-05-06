<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Crew;
use Illuminate\Support\Str;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\crews>
 */
class CrewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Crew::class;

    public function definition()
    {
        
        return [
            'firstname' => $this->faker->firstname,
            'lastname' => $this->faker->lastname,
            'middlename' => $this->faker->firstname,
            'email' => $this->faker->email,
            'address' => $this->faker->address,
            'education' => $this->faker->sentence,
            'contact_details' => $this->faker->phoneNumber,
        ];
    }
}
