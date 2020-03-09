<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Player;
use Faker\Generator as Faker;

$factory->define(Player::class, function (Faker $faker) {
    return [
        'first_name'    => $faker->name,
        'second_name'   => $faker->name,
        'form'          => $faker->numberBetween($min = 1, $max = 100),
        'total_points'  => $faker->numberBetween($min = 1, $max = 100),
        'influence'     => $faker->numberBetween($min = 1, $max = 100),
        'creativity'    => $faker->numberBetween($min = 1, $max = 100),
        'threat'        => $faker->numberBetween($min = 1, $max = 100),
        'ict_index'     => $faker->numberBetween($min = 1, $max = 100),
        'now_cost'      => $faker->numberBetween($min = 1, $max = 100),
        'points_per_game' => $faker->numberBetween($min = 1, $max = 100),
        'status'        => "D",
        'team'          => $faker->numberBetween($min = 1, $max = 100),
        'team_code'     => $faker->numberBetween($min = 1, $max = 100),
    ];
});
