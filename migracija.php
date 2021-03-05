<?php
$users = [
    ["name" => "Admin", "surname" => "Admin", "pass" => password_hash('123', PASSWORD_DEFAULT)]
];

file_put_contents(__DIR__.'/users.json', json_encode($users));
?>