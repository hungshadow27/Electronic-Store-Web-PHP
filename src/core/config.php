<?php

if ($_SERVER['SERVER_NAME'] == 'localhost') {
    define('DBNAME', 'electronic_store');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'http://localhost/electronic-store');
} else {
    define('DBNAME', 'my_db');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    define('ROOT', 'https://www.yourwebsite.com');
}
