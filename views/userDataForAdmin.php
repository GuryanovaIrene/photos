<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Регистрация в системе</title>
</head>
<body>
<h1 align="center">Введите данные для регистрации в системе</h1>
<form method="post" action="../routes/routes.php">
    <input type="hidden" name="route" value="userAddForAdmin"/>
    <table align="center">
        <td>e-mail</td>
        <td><input type="email" name="email"/></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="pwd"/></td>
        </tr>
        <tr>
            <td>Имя</td>
            <td><input type="text" size="50" name="userName"/></td>
        </tr>
        <tr>
            <td>Возраст</td>
            <td><input type="number" name="age"/></td>
        </tr>
        <tr>
            <td>Описание</td>
            <td><textarea name="userDescribe" cols="50" rows="3"></textarea></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="OK"/></td>
        </tr>
    </table>
</form>
</body>
</html>