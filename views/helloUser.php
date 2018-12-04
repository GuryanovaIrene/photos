<h1>Здравствуйте, <?php echo $user->userName;?>!</h1>
<h3>Данные Вашего аккаунта</h3>
<table>
    <tr>
        <td>Имя пользователя</td>
        <td><?php echo $user->userName;?></td>
    </tr>
    <tr>
        <td>Возраст</td>
        <td><?php echo $user->age;?></td>
    </tr>
    <tr>
        <td>Примечание</td>
        <td><?php echo $user->userDescribe;?></td>
    </tr>
</table>
<br/>