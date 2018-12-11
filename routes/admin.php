<?php

require "../controllers/AllUsersInfo.php";
$comm = new \App\AllUsersInfo();
$comm->usersListForAdmin('ASC');