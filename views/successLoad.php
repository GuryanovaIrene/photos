<?php echo SUCCESS;?> <a href="<?php echo PATH . $file->imageName;?>">Посмотреть</a><br/>
<form method="post" action="routes.php">
    <input type="hidden" name="route" value="returnToUser"/>
    <input type="hidden" name="userID" value="<?php echo $userID;?>"/>
    <input type="submit" value="Вернуться на главную страницу"/>
</form>