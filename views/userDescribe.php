<tr>
    <td><?php echo $user->userName?></td>
    <td><?php echo $user->email?></td>
    <td><?php echo $user->age?></td>
    <td><?php echo $status?></td>
    <td><?php echo $user->userDescribe?></td>
    <?php
    if ($regime == 'admin') {
        ?>
    <td>
<form method="post" enctype="multipart/form-data" action="../routes/routes.php">
    <input type="hidden" name="route" value="editUser"/>
    <input type="hidden" name="userID" value="<?php echo $user->userID?>"/>
    <input type="submit" value="Редактировать"/>
</form>
</td>
    <?php
    }
    ?>
</tr>