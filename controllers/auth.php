<?php
require_once("../models/MainModel.php");
require_once("../models/User.php");
$user = new \App\User('', $_POST['email'], $_POST['pwd'], '', '', '');

$user->auth();
if (empty($user->error)) {
    echo 'Здравствуйте, ' . $user->userName . '!<br/>';
    require("../views/loadImage.php");
} else {
    echo ERR_TITLE . '<br/>';
    foreach ($user->error as $error) {
        echo $error . '<br/><a href="../index.php">Вернуться к вводу данных</a>';
    }
}