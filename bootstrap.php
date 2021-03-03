<?php
session_start();
define('URL', 'http://localhost/bankas/'); //apibudina kelia iki aplikacijos narsykleje
define('DIR', __DIR__.'/'); //apibudina kelia iki aplikacijos serveryje
require DIR. 'app/functions.php';

_d($_SESSION, 'SESIJA--->');
?>
