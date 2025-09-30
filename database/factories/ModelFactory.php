<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Brackets\AdminAuth\Models\AdminUser::class, function (Faker\Generator $faker) {
    return [
        'activated' => true,
        'created_at' => $faker->dateTime,
        'deleted_at' => null,
        'email' => $faker->email,
        'first_name' => $faker->firstName,
        'forbidden' => $faker->boolean(),
        'language' => 'en',
        'last_login_at' => $faker->dateTime,
        'last_name' => $faker->lastName,
        'password' => bcrypt($faker->password),
        'remember_token' => null,
        'updated_at' => $faker->dateTime,
        
    ];
});/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Post::class, static function (Faker\Generator $faker) {
    return [
        'body' => $faker->text(),
        'category_id' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'enabled' => $faker->boolean(),
        'link' => $faker->text(),
        'published_at' => $faker->date(),
        'social_id' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Category::class, static function (Faker\Generator $faker) {
    return [
        'category' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Social::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'social' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Book::class, static function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence,
        'author' => $faker->sentence,
        'coauthor' => $faker->sentence,
        'editore' => $faker->sentence,
        'anno' => $faker->date(),
        'link' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Song::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Profile::class, static function (Faker\Generator $faker) {
    return [
        'bio' => $faker->text(),
        'created_at' => $faker->dateTime,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Book::class, static function (Faker\Generator $faker) {
    return [
        'anno' => $faker->date(),
        'author' => $faker->sentence,
        'coauthor' => $faker->sentence,
        'created_at' => $faker->dateTime,
        'editore' => $faker->sentence,
        'link' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Models\Single::class, static function (Faker\Generator $faker) {
    return [
        'created_at' => $faker->dateTime,
        'description' => $faker->text(),
        'enabled' => $faker->boolean(),
        'info' => $faker->text(),
        'link_songs' => $faker->sentence,
        'link_spotify' => $faker->sentence,
        'title' => $faker->sentence,
        'updated_at' => $faker->dateTime,
        
        
    ];
});
