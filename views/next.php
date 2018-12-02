<br/>
<form method="POST" action="loadMoreImage.php">
    <input type="hidden" name="userID" value="<?php echo $_POST['userID']?>"/>
    <input type="submit" value="Загрузить еще изображения?"/>
</form>
<br/>
<form method="POST" action="../controllers/allImages.php">
    <input type="hidden" name="userID" value="<?php echo $_POST['userID']?>"/>
    <input type="submit" value="Посмотреть все изображения"/>
</form>