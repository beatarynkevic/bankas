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
    <link rel="stylesheet" href="<?=URL?>/public/css/create.css">
    <title>New account</title>
</head>
<body>
    <!-- PERDAYTI KAD PASPAUDUS ADD MYGTUKA GALIMA BUTU IVESTI PINIGU -->
    <!-- <a href="<?= URL ?>create.php">Create</a>

    <form action="<?= URL ?>create.php" method="post">
    bananu kiekis: <input type="text" name="count">
    <button type="submit">Create</button>
    </form> -->
    <div class="container">
        <h1>New account</h1>
        <div class="wrap">
            <form action="" method="get">
                <div class="user-details">
                    <label>First Name:</label>
                    <input type="text">
                </div>
                <div class="user-details">
                    <label>Last Name:</label>
                    <input type="text">
                </div>
                <div class="user-details">
                    <label>ID Number:</label>
                    <input type="text">
                </div>
                <div class="user-details">
                    <label>Account Nr.:</label>
                    <input type="text">
                </div>
                <button class="myButton" type="sumbit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>