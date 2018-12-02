<?php

require_once "../models/User.php";

class MainController
{
    public $user;

    public function __construct($userID, $email, $pwd, $userName, $userDescribe)
    {
        $this->user = new User('', $_POST['email'], $_POST['pwd'], '', '', '');

        $this->user->auth();
        if (empty($this->user->error)) {
            echo 'Здравствуйте, ' . $this->user->userName . '!<br/>';
        } else {
            echo ERR_TITLE . '<br/>';
            foreach ($this->user->error as $error) {
                echo $error . '<br/><a href="../index.html">Вернуться к вводу данных</a>';
            }
        }
    }


}