<?php

namespace App;


class CommonInfo
{
    public function allFilesList($userID)
    {
        require_once("models/MainModel.php");
        $comm = new MainModel();
        $images = $comm->allImages($userID);
        foreach ($images as $value){
            require "views/imageLook.php";
        }
    }
}