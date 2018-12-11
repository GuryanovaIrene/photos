<?php

namespace App;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

class AllUsers extends MainModel
{
    public function usersListAsc()
    {
        require "../core/capsule.php";
        $data = Capsule::table('users')
            ->select(['userID', 'userName', 'email', 'age', 'userDescribe'])
            ->orderBy('age', 'asc')
            ->get();
        return $data;
    }

    public function usersListDesc()
    {
        require "../core/capsule.php";
        $data = Capsule::table('users')
            ->select(['userID', 'userName', 'email', 'age', 'userDescribe'])
            ->orderBy('age', 'desc')
            ->get();
        return $data;
    }
}