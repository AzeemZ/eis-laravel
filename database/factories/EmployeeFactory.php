<?php

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('12345'),
        'designation' => 'Employee',
        'contact' => $faker->phoneNumber,
    ];
});
