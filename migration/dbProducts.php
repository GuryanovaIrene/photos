<?php

require "../core/config.php";
require "../core/capsuleProducts.php";

use Illuminate\Database\Capsule\Manager as CapsuleProducts;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

CapsuleProducts::schema()->dropIfExists('categories');

CapsuleProducts::schema()->create('categories', function (Blueprint $table) {
    $table->increments('categoryID');
    $table->string('categoryName'); //varchar 255
});

CapsuleProducts::schema()->dropIfExists('products');

CapsuleProducts::schema()->create('products', function (Blueprint $table) {
    $table->increments('productId');
    $table->integer('categoryId');
    $table->string('productName'); //varchar 255
/*
        $table->foreign('categoryId')
            ->references('categoryId')->on('categories')
            ->onDelete('cascade');*/
});