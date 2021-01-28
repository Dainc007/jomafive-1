<?php

namespace Database\Factories;

use App\Models\Admin\Team;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class TeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Team::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->sentence(2),
            'league' => $this->faker->randomElement(Team::getAvailableLeagues()),
            'level' => $this->faker->numberBetween(1,3),
            'shieldPath' => 'https://picsum.photos/50',
            'teamPhotoPath' => 'https://picsum.photos/400'
        ];
    }
}
