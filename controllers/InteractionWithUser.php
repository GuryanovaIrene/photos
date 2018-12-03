<?php

namespace App;

class InteractionWithUser
{
    public function auth($email, $pwd)
    {
        require_once("models/MainModel.php");
        require_once("models/User.php");
        $user = new User('', $email, $pwd, '', '', '');

        $user->auth();
        if (empty($user->error)) {
            echo 'Здравствуйте, ' . $user->userName . '!<br/>';
            require("views/loadImage.php");
        } else {
            echo ERR_USER_TITLE . '<br/>';
            foreach ($user->error as $error) {
                echo $error . '<br/>';
            }
            echo '<a href="index.php">'.TRY_ENTER_AGAIN.'</a>';
        }
    }

    public function loadImage($userID)
    {
        require_once("models/MainModel.php");
        require_once("models/File.php");

        $file = new File($userID, $_FILES['picture']['type'], $_FILES['picture']['size'], $_FILES['picture']['tmp_name'], $_FILES['picture']['name']);
        $file->loadPhoto();
        if (empty($file->error)) {
            echo SUCCESS . ' <a href="' . PATH . $file->imageName . '">Посмотреть</a> ';
        } else {
            echo ERR_FILE_TITLE . '<br/>';
            foreach ($file->error as $error) {
                echo $error . '<br/>';
            }
        }

        require_once("views/loadMoreImage.php");
    }

    public function userAdd($email, $pwd, $userName, $age, $userDescribe)
    {
        require_once("models/MainModel.php");
        require_once "models/User.php";

        $user = new User('', $email, $pwd, $userName, $age, $userDescribe);

        $user->reg();

        if (empty($user->error)) {
            echo SUCCESS_GENERATE_USER . ' Вы можете <a href="index.php"> войти</a>';
        } else {
            echo ERR_USER_TITLE;
            foreach ($user->error as $error) {
                echo $error . '<br/>';
            }
        }
    }
}