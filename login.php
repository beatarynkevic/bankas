<?php
require __DIR__.'/bootstrap.php';

//PRISIJUNGIMO scenarijus
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $users = file_get_contents(__DIR__.'/users.json');
    $users = json_decode($users, 1);

    $postName = $_POST['name'] ?? '';
    $postPass = $_POST['pass'] ?? '';

    foreach($users as $user) {
        if($postName == $user['name']) {
            if(password_verify($postPass, $user['pass'])) {
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
//LOGOUT scenarijus
if(isset($_GET['logout'])) {
    session_destroy();
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
        </div>
    </nav>

    <div class="forma">
    <!-- tikrinam ar yra ERROR pranesimas -->
    <?php if(isset($_SESSION['errorMsg'])) : ?>
        <h3 style="color:red"><?= $_SESSION['errorMsg'] ?></h3>
       <?php unset($_SESSION['errorMsg']) ?>
    <?php endif ?>
        <form action="<?= URL?>login.php" method="post">
            <input placeholder="Enter name" type="text" name="name">
            <input placeholder="Enter password" type="password" name="pass">
            <button type="submit" class="myButton">Prisijungti</button>
        </form>
    </div>
</body>

</html>