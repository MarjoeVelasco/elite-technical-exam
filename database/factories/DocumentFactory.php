<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Document;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\documents>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Document::class;

    public function definition()
    {
        return [
            'code' => $this->faker->unique()->randomNumber(6),
            'name' => $this->faker->sentence($nbWords = 3, $variableNbWords = true) . '.pdf',
            'document_number' => $this->faker->unique()->randomNumber(5),
            'date_issued' => $this->$faker->dateTimeBetween('-10 years', 'now')->format('Y-m-d'),
            'date_expiry' =>  $faker->dateTimeBetween($dateIssued, '+5 years')->format('Y-m-d'),
            'remarks' => $this->faker->sentence,
            'crew_id' => Crew::factory()->create()->id,
        ];
    }
}
