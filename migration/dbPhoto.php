<?php

require "../core/config.php";
require "../core/capsule.php";

use Illuminate\Database\Capsule\Manager as CapsuleProducts;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
            $table->increments('userID');
            $table->string('email');
            $table->string('userName');
            $table->string('pwd');
            $table->integer('age');
            $table->text('userDescribe');
        });

Capsule::schema()->dropIfExists('users');

Capsule::schema()->create('users', function (Blueprint $table) {
    $table->increments('userID');
    $table->string('email');
    $table->string('userName');
    $table->string('pwd');
    $table->integer('age');
    $table->text('userDescribe');
});