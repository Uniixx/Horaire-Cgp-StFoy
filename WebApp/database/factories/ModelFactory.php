<?php

/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'activated' => true,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'deleted_at' => null,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        'last_login_at' => $faker->dateTime,
        
    ];
});/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Dayclass::class, static function (Faker\Generator $faker) {
    return [
        'endingTime' => $faker->dateTime,
        'horaireID' => $faker->randomNumber(5),
        'name' => $faker->firstName,
        'room' => $faker->sentence,
        'startingTime' => $faker->dateTime,
        'suffix' => $faker->sentence,
        'teacher' => $faker->sentence,
        'note' => $faker->sentence,
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Horaire::class, static function (Faker\Generator $faker) {
    return [
        'day' => $faker->randomNumber(5),
        'guildId' => $faker->sentence,
        'month' => $faker->randomNumber(5),
        'year' => $faker->randomNumber(5),
        
        
    ];
});
/** @var  \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Config::class, static function (Faker\Generator $faker) {
    return [
        'guildId' => $faker->sentence,
        'logchannel' => $faker->sentence,
        'prefix' => $faker->sentence,
        'welcomechannel' => $faker->sentence,
        
        
    ];
});
