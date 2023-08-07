<?php

namespace Database\Factories;

use App\Enums\Status;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Reservation>
 */
class ReservationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dateStart = Carbon::parse($this->faker->dateTimeBetween('-3 month', '+1 month'));

        return [
            'status' => Status::PROCESSING->value,
            'phone' => fake()->numerify('380#########'),
            'email' => fake()->email(),
            'date_start' => $dateStart->format('Y-m-d'),
            'date_end' => $dateStart->addDays(rand(1,10))->format('Y-m-d'),
            'user_id' => User::all()->random(),
        ];
    }
}
