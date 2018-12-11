<?php
use Illuminate\Database\Capsule\Manager as CapsuleProducts;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

$capsule = new CapsuleProducts;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'Irene.loftschool',
    'database'  => 'products',
    'username'  => 'root',
    'password'  => '',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();