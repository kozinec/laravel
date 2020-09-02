<?php

/** @var Factory $factory */

use App\Models\Headhunters;
use App\Models\Tag;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Headhunters::class, function (Faker $faker) {
    return [
        'name' => $faker->text(rand(5, 20)),
        'remember_token' => $faker->text(rand(10, 20)),
        'user_id' => function () {
            return User::inRandomOrder()->get()->first()->id;
        },
    ];
});

$factory->define(Tag::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
