<?php
session_start();

require "./src/core/init.php";
error_reporting(E_ALL);
ini_set('display_errors', 1);
set_error_handler('showError');

$db = new Database;
$user = $db->table('user')
    ->updateRow(7, [
        'username' => 'Tèo',
        'password' => 'teo123'
    ]);
$app = new App();
$app->loadController();
