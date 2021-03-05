<?php
require __DIR__.'/bootstrap.php';
_d(readData());

if(!isset($_SESSION['login']) || 1 != $_SESSION['login']) {
    header('Location: '. URL .'login.php');
    die;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=URL?>/public/css/app.css">
    <title>Private</title>
</head>
<body>
    <h1>Hello, <?= $_SESSION['user']['name'] ?> 🖖</h1>
    <div class="mygtukai">

        <a class="btn btn-success" href="<?= URL ?>create.php">Create new account</a>
            <!-- atsijungimo linkas. Kreipiames i logino pslp,  -->
        <a class="btn btn-dark" role="button" href="<?= URL?>login.php?logout">Logout</a>

    </div>
    <ul>
    <?php foreach(readData() as $saskaita) : ?>
        <li>
            <span>ID: <?= $saskaita['id'] ?></span>
            <span>Saskaitoje: <?= $saskaita['saskaitoje'] ?></span>
        </li>
    <?php endforeach?>
    </ul>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nr.</th>
                <th scope="col">Sąskaitos nr.</th>
                <th scope="col">Sąskaitos likutis</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(readData() as $saskaita) : ?>
                <tr>
                    <th scope="row"><?= $saskaita['id'] ?></th>
                    <td><?= "LT12 3456 7890 1234"?></td>
                    <td><?= $saskaita['saskaitoje'] ?></td>
                    <td>
                        <button class="btn btn-success" type="submit">Add</button>
                        <button class="btn btn-warning" type="submit">Withdrawal</button>
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
</body>
</html>