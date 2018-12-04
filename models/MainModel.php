<?php
namespace App;

require("../core/config.php");

class MainModel
{
    public $error = [];

    public function conn()
    {
        return new \PDO(DSN, 'root', '');
    }
}