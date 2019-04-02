<?php

use App\User;
use App\Food;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'avatar' => 'storage/image/user.png'
    ];
});

$factory->define(App\Food::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text,
        'image_url' => 'https://images.pexels.com/photos/2050425/pexels-photo-2050425.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=750&w=1260'
    ];
});
