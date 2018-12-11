<?php

require_once("../models/MainModel.php");
require_once("../models/User.php");
require_once("../core/capsule.php");


use App\User;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Schema\Blueprint;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
            $table->increments('userID');
            $table->string('email');
            $table->string('userName');
            $table->string('pwd');
            $table->integer('age');
            $table->text('userDescribe');
        });

Capsule::schema()->dropIfExists('photos');

Capsule::schema()->create('photos', function (Blueprint $table) {
    $table->increments('photoID');
    $table->string('url');
    $table->integer('userID');
});

$faker = Faker\Factory::create();
for ($i = 1; $i <= 20; $i++) {
    $user = new User('', $faker->email, $faker->password, $faker->userName, $faker->numberBetween(1, 99), $faker->text);
    $user->reg();
}
