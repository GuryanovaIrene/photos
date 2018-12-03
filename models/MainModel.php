<?php
namespace App;

require("config.php");

class MainModel
{
    public $userID;
    public $error = [];

    public function conn()
    {
        return new \PDO(DSN, 'root', '');
    }

    public function allImages($userID)
    {
        $pdo = $this->conn();
        $prepare = $pdo->prepare('select url from photos where userID = :userID');
        $prepare->execute(['userID' => $userID]);

        return $prepare->fetchAll(\PDO::FETCH_ASSOC);
    }
}