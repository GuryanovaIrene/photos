<?php

namespace App;


class AllUsersInfo
{
    public function usersList($sortType)
    {
        require_once("models/MainModel.php");
        require_once("models/AllUsers.php");

        $allUsers = new AllUsers();
        switch ($sortType) {
            case 'ASC':
                $data = $allUsers->usersListAsc();
                break;
            case 'DESC':
                $data = $allUsers->usersListDesc();
                break;
        }

        require("views/tableHeader.php");

        foreach ($data as $user) {
            if ($user['age'] > 18) {
                $status = 'Совершеннолетний';
            } else {
                $status = 'Несовершеннолетний';
            }
            require("views/userDescribe.php");
        }

        require("views/tableFooter.php");
    }
}