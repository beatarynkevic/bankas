<?php
require __DIR__.'/bootstrap.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=URL?>/public/css/app.css">
    <link rel="stylesheet" href="<?=URL?>/public/css/create.css">
    <title>Add</title>
</head>
<body>    
    <div class="mygtukai">
        <a class="btn btn-success" type="submit">Add</a>
        <a class="btn btn-danger" type="submit">Delete</a>
        <a href="<?= URL ?>private.php" class="btn btn-secondary" type="submit">Go back</a>
    </div>
    <div class="container">
        <div class="wrap">
            <form action="">
                <input class="add" type="text">
                <button type="submit" class="add btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>
</html>