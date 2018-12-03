<?php
switch ($_POST['route']) {
    case 'auth':
        require "controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->auth($_POST['email'], $_POST['pwd']);
        break;
    case 'loadImage':
        require "controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->loadImage($_POST['userID']);
        break;
    case 'userAdd':
        require "controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->userAdd($_POST['email'], $_POST['pwd'], $_POST['userName'], $_POST['age'], $_POST['userDescribe']);
        break;
}