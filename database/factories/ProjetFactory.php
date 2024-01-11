<?php
namespace Database\Factories;

use App\Models\Projet;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjetFactory extends Factory
{
    protected $model = Projet::class;

    public function definition()
    {
        return [
            'nom' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'localisation' => $this->faker->city,
            'client' => $this->faker->name,
            'responsable' => $this->faker->name,
            'date_debut' => $this->faker->date,
            'date_fin' => $this->faker->date,
            'budget' => $this->faker->randomFloat(2, 100, 10000),
            'avancement' => $this->faker->randomFloat(1,2),

            'user_id' => function () {
                return \App\Models\User::factory()->create()->id;
            },
        ];
    }
}
