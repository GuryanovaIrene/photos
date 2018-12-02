<?php

require_once "../models/User.php";

$user = new \App\User('', $_POST['email'], $_POST['pwd'], $_POST['userName'], $_POST['age'], $_POST['userDescribe']);

$user->reg();

if (empty($user->error)) {
    echo 'Пользователь сгенерирован успешно. Вы можете <a href="../index.html"> войти</a>';
} else {
    echo ERROR_TITLE;
    foreach ($user->error as $error) {
        echo $error . '<br/>';
    }
}