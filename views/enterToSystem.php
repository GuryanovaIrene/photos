<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Входа или регистрация</title>
</head>
<body>
<h1 align="center">Войти в систему</h1>
<form method="post" action="routes.php">
    <input type="hidden" name="route" value="auth"/>
    <table align="center">
        <tr>
            <td>e-mail</td>
            <td><input type="email" name="email"/></td>
        </tr>
        <tr>
            <td>Пароль</td>
            <td><input type="password" name="pwd"/></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" value="OK"/></td>
        </tr>
    </table>
</form>
<div align="center">Вы еще не в системе? <a href="views/userData.php">Зарегистрироваться</a></div>
</body>
</html>