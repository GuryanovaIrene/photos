<h1>Загрузка изображения</h1>

<form method="post" enctype="multipart/form-data" action="routes.php">
    <input type="hidden" name="route" value="loadImage"/>
    <input type="hidden" name="userID" value="<?php echo $user->userID;?>"/>
    <input type="file" name="picture"/>
    <input type="submit" value="Загрузить"/>
</form>
<br/>
<form method="post" enctype="multipart/form-data" action="routes.php">
    <input type="hidden" name="route" value="allImagesByUser"/>
    <input type="hidden" name="userID" value="<?php echo $user->userID;?>"/>
    <input type="submit" value="Посмотреть все изображения"/>
</form>
<br/>
<form method="post" enctype="multipart/form-data" action="routes.php">
    <input type="hidden" name="route" value="allUsersInfo"/>
    <input type="submit" value="Показать всех пользователей"/>
</form>