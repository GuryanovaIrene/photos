<h1>Загрузка изображения</h1>

<form method="post" enctype="multipart/form-data" action="../controllers/addImage.php">
    <input type="hidden" name="userID" value="<?php echo $_POST['userID']?>">
    <input type="file" name="picture">
    <input type="submit" value="Загрузить">
</form>