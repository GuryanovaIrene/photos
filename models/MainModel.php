<?php
namespace App;

require("../config.php");

class MainModel
{
    public $userID;
    public $error = [];

    public function conn()
    {
        return new \PDO(DSN, 'root', '');
    }
}