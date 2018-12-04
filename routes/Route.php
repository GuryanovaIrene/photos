<?php

namespace App;


class Route
{
    public $params;
    public function __construct($params)
    {
        $this->params = $params;
    }

    public function auth()
    {
        require "../controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->auth($this->params['email'], $this->params['pwd']);
    }

    public function loadImage()
    {
        require "../controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->loadImage($this->params['userID']);
    }

    public function userAdd()
    {
        require "../controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->userAdd($this->params['email'], $this->params['pwd'], $this->params['userName'], $this->params['age'], $this->params['userDescribe']);
    }

    public function allUsersInfo()
    {
        require "../controllers/AllUsersInfo.php";
        $comm = new \App\AllUsersInfo();
        $comm->usersList('ASC');
        $comm->usersList('DESC');
    }

    public function returnToUser()
    {
        require "../controllers/InteractionWithUser.php";
        $comm = new \App\InteractionWithUser();
        $comm->returnToUser($this->params['userID']);
    }
}