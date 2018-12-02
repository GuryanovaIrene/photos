<h1>Загрузка изображения</h1>

<form method="post" enctype="multipart/form-data" action="addImage.php">
    <input type="hidden" name="userID" value="<?php echo $user->userID;?>">
    <input type="file" name="picture">
    <input type="submit" value="Загрузить">
</form>
<br/>
<a href="../controllers/allImages.php">Посмотреть все изображения</a>