<?php
require_once("../models/MainModel.php");
require_once("../models/File.php");

$file = new \App\File($_POST['userID'], $_FILES['picture']['type'], $_FILES['picture']['size'], $_FILES['picture']['tmp_name'], $_FILES['picture']['name']);
$file->loadPhoto();
if (empty($file->error)) {
    echo SUCCESS . ' <a href="' . PATH . $file->imageName . '">Посмотреть</a> ';
} else {
    echo ERROR_TITLE . '<br/>';
    foreach ($file->error as $error) {
        echo $error . '<br/>';
    }
}

require_once("../views/next.php");
