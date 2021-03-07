<?php
require __DIR__.'/bootstrap.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $add_money = $_POST['count'] ?? 0;
    $add_money = (int) $add_money;
    $id = $_GET['id'] ?? 0;
    $id = (int) $id;
    update($id, $add_money);
    header('Location: '.URL);
    die;
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? 0;
    $id = (int) $id;
    $account = getAccount($id);
    if(!$account) {
        header('Location: '.URL);
        die;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=URL?>/public/css/app.css">
    <link rel="stylesheet" href="<?=URL?>/public/css/create.css">
    <title>Add money to account</title>
</head>
<body>    
    <div class="mygtukai">
        <a href="<?= URL ?>withdraw.php" class="btn btn-warning" type="submit">Withdraw</a>
        <a href="<?= URL ?>delete.php" class="btn btn-danger" type="submit">Delete</a>
        <a href="<?= URL ?>private.php" class="btn btn-secondary" type="submit">Go back</a>
        <h2>Client: <?= get_client_info($_GET['id'])?></h2>
    </div>
    <div class="container">
        <div class="wrap">
            <form action="<?= URL ?>add.php?id=<?= $_GET['id'] ?>" method="post">
                <input class="add" type="text" name="count">
                <button type="submit" class="add btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>