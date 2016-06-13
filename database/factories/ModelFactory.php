<?php


/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Menu::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20)
    ];
});

$factory->define(App\CompanyType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20),
        'menu_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->word,        
        'cover' => "1.jpg",
        'companyType_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

// products

$factory->define(App\ProductMenu::class, function (Faker\Generator $faker) {
    return [
        'name' => 'prod' . $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20)
    ];
});

$factory->define(App\ProductType::class, function (Faker\Generator $faker) {
    return [
        'name' => 'prod' . $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20),
        'productmenu_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\ProductSubType::class, function (Faker\Generator $faker) {
    return [
        'name' => 'sub' . $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20),
        'producttype_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => 'prod' . $faker->name,
        'photo' =>  '1.jpg',
        'description' =>  $faker->paragraph,
        'company_id' => $faker->numberBetween($min = 1, $max = 100),
        'productsubtype_id' => $faker->numberBetween($min = 1, $max = 100),
    ];
});

// Places

$factory->define(App\PlaceMenu::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20)
    ];
});

$factory->define(App\PlaceType::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'position' => $faker->numberBetween($min = 1, $max = 20),
        'placeMenu_id' => $faker->numberBetween($min = 1, $max = 10),
    ];
});

$factory->define(App\Place::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'url' => $faker->word,
        'cover' => "1.jpg",
        'placeType_id' => $faker->numberBetween($min = 1, $max = 30),
    ];
});