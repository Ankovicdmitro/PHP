<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../style.css">
    <title>PR9</title>
</head>

<body>
<div class="wrap">
    <header>
        <a href="../../" class="back">Назад</a>
        <span>Практична робота №9</span>
    </header>
    
<div class="center">
<ul class="menu">
    <li><a href="/pr9">Студенты</a></li>
    <li><a href="/pr9/index.php/subjects">Предметы</a></li>
    <li><a href="/pr9/index.php/uspishnist">Успеваемость</a></li>
</ul>

<form action="<?php echo "/pr9/index.php/subjects/addSubject" ?>" method="post">
    <input type="text" name="name" placeholder="Название" required /><br>

    <br>
    <input type="submit" value="Отправить" />
</form>

<hr>
<?php
if ($subjects) { ?>
    <form action="<?php echo "/pr9/index.php/subjects/actions" ?>" method="post">
        <table>
            <tr>
                <th>Имя</th>

                <th>Действие</th>
            </tr>
            <?php foreach ($subjects as $s) { ?>
                <tr>
                    <td>
                        <input type="text" name="name[<?php echo $s['id']; ?>]" required value="<?php echo $s['name']; ?>">
                    </td>

                    <td>
                        <button type="submit" name="update" value="<?php echo $s['id']; ?>">Update</button>
                        <button type="submit" name="delete" value="<?php echo $s['id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
<?php } ?>
</div>
<footer>Запоріжжя 2024</footer>
</div>
</body>

</html>