<?php

namespace App;

class TransImage
{
    public $userID;
    public $fileID;

    public function __construct($userID, $fileID)
    {
        $this->userID = $userID;
        $this->fileID = $fileID;
    }

    public function transImage()
    {
        require_once("../models/MainModel.php");
        require_once("../models/User.php");
        require_once("../models/File.php");
        require_once("../models/TransformImage.php");

        $image = new TransformImage($this->userID, $this->fileID);
        $image->rotateImage();
        $image->resizeImage();
        $image->addWaterMark();
    }
}