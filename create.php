<?php
require __DIR__.'/bootstrap.php';
//POST scenarijus
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $saskaitoje = $_POST['count'] ?? 0;
    $saskaitoje = (int) $saskaitoje;
    create($saskaitoje); //saskaitos sukurimas
    header('Location: '. URL .'private.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saskaitos</title>
</head>
<body>
    <h1>Nauja saskaita</h1>
    <a href="<?= URL ?>create.php">Create</a>

    <form action="<?= URL ?>create.php" method="post">
    Sąskaitos likutis: <input type="text" name="count">
    <button type="submit">Create</button>
    </form>
</body>
</html>