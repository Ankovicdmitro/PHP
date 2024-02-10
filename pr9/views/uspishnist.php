<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
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

<form action="/pr9/index.php/uspishnist/addToDb" method="POST">

    <select name="sid">
        <option value="">-------</option>
        <?php if (isset($students)) { ?>
            <?php foreach ($students as $s) { ?>
                <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>
    <select name="pid">
        <option value="">-------</option>
        <?php if (isset($subjects)) { ?>
            <?php foreach ($subjects as $s) { ?>
                <option value="<?php echo $s['id'];?>"><?php echo $s['name'];?></option>
            <?php } ?>
        <?php } ?>
    </select>
    <br>
    <input type="number" name="mark" placeholder="Оценка" required /><br>

    <input type="submit" value="Отправить" />
</form>

<hr>

<?php
if (isset($uspishnist)) { ?>
    <form method="POST" action="/pr9/index.php/uspishnist/actions">
        <table>
            <tr>
                <th>Студент</th>
                <th>Предмет</th>
                <th>Оценка</th>
                <th>Действие</th>
            </tr>
            <?php foreach ($uspishnist as $u) { ?>
                <tr>
                    <td>
                        <select name="sid[<?php echo $u['id']; ?>]">
                            <?php if ($students) { ?>
                                <?php foreach ($students as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>"<?php if ($u['sid'] == $s['id']) echo 'selected'; ?>>
                                        <?php echo $s['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td>
                        <select name="pid[<?php echo $u['id']; ?>]">
                            <?php if ($subjects) { ?>
                                <?php foreach ($subjects as $s) { ?>
                                    <option value="<?php echo $s['id']; ?>" <?php if ($u['pid'] == $s['id']) echo 'selected';  ?>>
                                        <?php echo $s['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                        </select>
                    </td>
                    <td> <input type="number" name="mark[<?php echo $u['id']; ?>]" required
                                value="<?php echo $u['mark']; ?>"> </td>
                    <td>
                        <button type="submit" name="update" value="<?php echo $u['id']; ?>">Update</button>
                        <button type="submit" name="delete" value="<?php echo $u['id']; ?>">Delete</button>
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