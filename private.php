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
    <h1>Labas, <?= $_SESSION['user']['name'] ?> 🖖</h1>
    <div class="mygtukai">
        <!-- <button class="btn btn-primary" type="submit">Naujas mokėjimas</button> -->
        <a class="btn btn-success" href="<?= URL ?>create.php">Kurti nauja saskaita</a>
        <!-- <button class="btn btn-warning" type="submit">Nusaičiuoti lėšas</button>
        <button class="btn btn-danger" type="submit">Ištrinti</button> -->
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
                <th scope="col">Id</th>
                <th scope="col">Sąskaitos nr.</th>
                <th scope="col">Sąskaitos likutis</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach(readData() as $saskaita) : ?>
                <tr>
                    <th scope="row"><?= $saskaita['id'] ?></th>
                    <td><?= "LT12 3456 7890 1234"?></td>
                    <td><?= $saskaita['saskaitoje'] ?></td>
                </tr>
            <?php endforeach?>
        </tbody>
    </table>
    <!-- atsijungimo linkas. Kreipiames i logino pslp,  -->
    <a class="btn btn-dark" role="button" href="<?= URL?>login.php?logout">Atsijungti</a>
</body>
</html>