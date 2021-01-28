<?php

namespace Database\Factories;

use App\Models\Admin\LeagueTable;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;


class LeagueTableFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = LeagueTable::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'teamName' => $this->faker->randomElement(['Real Madryt', 'FC Barcelona', 'Atletico Madryt', 'KS Kosmokaczki', 'Arsenal', 'Chelsea']),
            'wins' => 0,
            'draws' => 0,
            'losts' => 0,
            'games' => 0,
            'points' => 0,
            'competitionID' => $this->faker->numberBetween(1,3)
        ];
    }
}
