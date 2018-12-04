<?php

namespace App;

class InteractionWithUser
{
    public function auth($email, $pwd)
    {
        require_once("../models/MainModel.php");
        require_once("../models/User.php");
        $user = new User(0, $email, $pwd, '', '', '');
        $user->auth();
        if (empty($user->error)) {
            $this->helloUser($user);
        } else {
            echo ERR_USER_TITLE . '<br/>';
            foreach ($user->error as $error) {
                echo $error . '<br/>';
            }
            echo '<a href="../index.php">'.TRY_ENTER_AGAIN.'</a>';
        }
    }

    public function helloUser($user)
    {
        require "../views/helloUser.php";
        $this->allFilesList($user);
        require "../views/showAllUsers.php";
        require "../views/loadImage.php";
    }

    public function returnToUser($userID)
    {
        require_once("../models/MainModel.php");
        require_once("../models/User.php");
        $user = new User($userID, '', '', '', '', '');
        $this->helloUser($user);
    }

    public function loadImage($userID)
    {
        require_once("../models/MainModel.php");
        require_once("../models/User.php");
        require_once("../models/File.php");

        $file = new File($userID, $_FILES['picture']['type'], $_FILES['picture']['size'], $_FILES['picture']['tmp_name'], $_FILES['picture']['name']);
        $file->loadPhoto();
        if (empty($file->error)) {
            require "../views/successLoad.php";
        } else {
            echo ERR_FILE_TITLE . '<br/>';
            foreach ($file->error as $error) {
                echo $error . '<br/>';
            }
        }
    }

    public function userAdd($email, $pwd, $userName, $age, $userDescribe)
    {
        require_once("../models/MainModel.php");
        require_once "../models/User.php";

        $user = new User('', $email, $pwd, $userName, $age, $userDescribe);

        $user->reg();

        if (empty($user->error)) {
            echo SUCCESS_GENERATE_USER . ' Вы можете <a href="../index.php"> войти</a>';
        } else {
            echo ERR_USER_TITLE;
            foreach ($user->error as $error) {
                echo $error . '<br/>';
            }
        }
    }

    public function allFilesList($user)
    {
        $images = $user->allImages();
        require "../views/imageLookTitle.php";
        foreach ($images as $value){
            require "../views/imageLook.php";
        }
        require "../views/imageLookFooter.php";
    }
}