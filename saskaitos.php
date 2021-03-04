<?php
require __DIR__.'/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kurti nauja saskaita</title>
</head>
<body>
    <a href="<?= URL ?>create.php">Create</a>
    <ul>
    <?php foreach(readData() as $saskaita) : ?>
        <li>
            <span>ID: <?= $saskaita['id'] ?></span>
            <span>ID: <?= $saskaita['saskaitoje'] ?></span>
        </li>
    <?php endforeach?>
    </ul>
</body>
</html>