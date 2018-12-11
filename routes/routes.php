<?php
require("Route.php");

$route = new \App\Route($_POST);
switch ($_POST['route']) {
    case 'auth':
        $route->auth();
        break;
    case 'loadImage':
        $route->loadImage();
        break;
    case 'userAdd':
        $route->userAdd();
        break;
    case 'allImagesByUser':
        $route->allImagesByUser();
        break;
    case 'allUsersInfo':
        $route->allUsersInfo();
        break;
    case 'returnToUser':
        $route->returnToUser();
        break;
    case 'transformImage':
        $route->transImage();
        break;
    case 'userAddForAdmin':
        $route->userAddForAdmin();
        break;
    case 'editUser':
        $route->editUser();
        break;
    case 'updateUser':
        $route->updateUser();
        break;
}
