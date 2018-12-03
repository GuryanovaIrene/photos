<?php

namespace App;

class AllUsers extends MainModel
{
    public function usersListAsc()
    {
        $pdo = $this->conn();
        $prepare = $pdo->prepare('select userID, userName, email, age, userDescribe from users
                                    order by age asc');
        $prepare->execute();
        return $prepare->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function usersListDesc()
    {
        $pdo = $this->conn();
        $prepare = $pdo->prepare('select userID, userName, email, age, userDescribe from users
                                    order by age desc');
        $prepare->execute();
        return $prepare->fetchAll(\PDO::FETCH_ASSOC);
    }
}