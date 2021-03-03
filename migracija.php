<?php
$users = [
    ["name" => "Beata", "surname" => "Rynkevič", "pass" => password_hash('123', PASSWORD_DEFAULT)],
    ["name" => "Labas", "surname" => "Rytas", "pass" => password_hash('123', PASSWORD_DEFAULT)],
    ["name" => "Tom", "surname" => "Jerry", "pass" => password_hash('123', PASSWORD_DEFAULT)]
];

file_put_contents(__DIR__.'/users.json', json_encode($users));
?>