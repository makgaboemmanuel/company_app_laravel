<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use App\User;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    return [
        /*  user added code  */
        'name' => $faker->company,
        'address' => $faker->address,
        'website' => $faker->domainName,
        'email' => $faker->email
        /*  user added code   */

        /*'user_id' => factory(User::class) */
    ];
});
