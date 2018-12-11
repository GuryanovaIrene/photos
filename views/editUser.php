<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация в системе</title>
</head>
<body>
<h1 align="center">Данные пользователя</h1>
<form method="post" action="../routes/routes.php">
    <input type="hidden" name="route" value="updateUser"/>
    <input type="hidden" name="userID" value="<?php echo $user->userID;?>"/>
    <table align="center">
        <tr>
            <td>Имя</td>
            <td><input type="text" size="50" name="userName" value="<?php echo $user->userName;?>"/></td>
        </tr>
        <tr>
            <td>Возраст</td>
            <td><input type="number" name="age" value="<?php echo $user->age;?>"/></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea name="userDescribe" cols="50" rows="3"><?php echo $user->userDescribe;?></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="OK"/></td>
        </tr>
    </table>
</form>
</body>
</html>