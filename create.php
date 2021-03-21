<?php
require __DIR__.'/bootstrap.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(empty($_POST["name"]) || empty($_POST["surname"]) || empty($_POST["id_number"]) || empty($_POST["account_number"])) {
        $_SESSION['error_msg'] = "ALL FIELDS MUST BE FILED";
        header('Location: '.URL.'create.php');
        die;
    } elseif (strlen($_POST["name"]) < 4) {
        $_SESSION['error_msg'] = "Name and surname must be longer";
        header('Location: '.URL.'create.php');
        die;
    } else {
        create($_POST); //saskaitos sukurimas
        header('Location: '. URL .'private.php');
        die;
    }
}

// $eleven_nr="";
// while($eleven_nr < 11) {$eleven_nr += rand(0,9);}

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
    <div class="container">
        <h1>New account</h1>
        <!-- tikrinam ar yra pranesimas -->
        <div class="wrap">
        <?php if(isset($_SESSION['error_msg'])) : ?>
            <h3 style="color:tomato; font-size: 17px;"><?= $_SESSION['error_msg'] ?></h3>
            <?php unset($_SESSION['error_msg']) ?>
            <?php endif ?>
            <form action=" <?= URL?>create.php" method="post">
                <div class="user-details">
                    <label>First Name:</label>
                    <input type="text" name="name">
                </div>
                <div class="user-details">
                    <label>Last Name:</label>
                    <input type="text" name="surname">
                </div>
                <div class="user-details">
                    <label>ID Number:</label>
                    <input type="text" name="id_number">
                </div>
                <div class="user-details">
                    <label>Account Nr.:</label>
                    <input type="text" name="account_number" value="<?= ibam_generator(); ?>" readonly>
                </div>
                <button class="myButton" type="sumbit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>