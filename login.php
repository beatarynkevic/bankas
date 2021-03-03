<?php
require __DIR__.'/bootstrap.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__.'/users.json');
    $users = json_decode($users, 1);

    $postName = $_POST['name'] ?? '';
    $postPass = ($_POST['pass'] ?? '');

    foreach($users as $key) {
        if($postName == $users['name']) {
            if(password_verify($postPass, $users['pass'])) {
                $_SESSION['login'] = 1;
                $_SESSION['user'] = $user;
                header('Location: '. URL.'private.php');
                die;
            }
        }
    }
    $_SESSION['errorMsg'] = 'Password or Name is invalid';
    header('Location: '. URL.'login.php');
    die;

}












?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/app.css">
    <title>Login</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <h1>KatinoBankas</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <div class="forma">
        <form action="<?= URL?>login.php" method="post">
            <input placeholder="Enter name" type="text" name="name">
            <input placeholder="Enter password" type="password" name="pass">
            <button type="submit" class="myButton">Prisijungti</button>
        </form>
    </div>
</body>

</html>