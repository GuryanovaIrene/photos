<li><a href="<?php echo $value->url?>"><?php echo $value->url?></a>
    <form method="post" enctype="multipart/form-data" action="routes.php">
        <input type="hidden" name="route" value="transformImage"/>
        <input type="hidden" name="userID" value="<?php echo $user->userID;?>"/>
        <input type="hidden" name="photoID" value="<?php echo $value->photoID?>"/>
        <input type="submit" value="Трансформировать"/>
    </form> </li>