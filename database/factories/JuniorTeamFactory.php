<?php

namespace Database\Factories;

use App\Models\Admin\JuniorTeam;
use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class JuniorTeamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JuniorTeam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nickname' => $this->faker->sentence(2),
            'class' => $this->faker->randomElement([2008,2009,2010,2011,2012]),
            'level' => $this->faker->numberBetween(1,3),
            'shieldPath' => 'https://picsum.photos/50',
            'teamPhotoPath' => 'https://picsum.photos/400'
        ];
    }
}
