<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::all()->random();

        while (count($user->categories) == 0) {
            $user = User::all()->random();
        }

        return [
            'title' => $this->faker->text(30),
            'description' => $this->faker->text(100),
            'due_date' => $this->faker->dateTime(),
            'user_id' => $user,
            'category_id' => $user->categories->random()
        ];
    }
}
