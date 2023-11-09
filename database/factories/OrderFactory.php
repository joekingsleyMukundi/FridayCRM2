<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::all()->random();

        $product = Product::all()->random();

        return [
            "user_id" => $user->id,
            "product_id" => $product->id,
            "date" => Carbon::now()->addDays(rand(1, 10)),
            "vehicle_registration" => fake()->word(),
            "entry_number" => fake()->numberBetween(10000, 100000),
            "kra_due" => fake()->numberBetween(1000, 10000),
            "kebs_due" => fake()->numberBetween(1000, 10000),
            "other_charges" => fake()->numberBetween(100, 1000),
            "total_value" => fake()->numberBetween(10000, 100000),
            "created_at" => Carbon::now()->subDay(rand(3, 12)),
        ];
    }
}
