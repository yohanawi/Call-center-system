<?php
    /* DATABASE CONNECTION*/
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'Company';

    global $connection;
    $connection = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
    if (!$connection) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
    }
    try {
        $db = new PDO('mysql:dbhost=localhost;dbname=Company;charset=utf8', 'root', '');
    } catch (Exception $e) {

        die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
    }
    /*DATABASE CONNECTION */
?>