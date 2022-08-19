<?php
    /* DATABASE CONNECTION*/
    $db['db_host'] = 'localhost';
    $db['db_user'] = 'root';
    $db['db_pass'] = '';
    $db['db_name'] = 'Company';

    foreach ($db as $key => $value) {
        define(strtoupper($key), $value);
    }
    global $conn;
    $conn = mysqli_connect($db['db_host'], $db['db_user'], $db['db_pass'], $db['db_name']);
    if (!$conn) {
        die("Cannot Establish A Secure Connection To The Host Server At The Moment!");
    }
    try {
        $db = new PDO('mysql:dbhost=localhost;dbname=Company;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Cannot Establish A Secure Connection To The Host Server At The Moment!');
    }
    /*DATABASE CONNECTION */
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
       
        $a = mysqli_query($conn, "UPDATE users SET fname='$fname',lname='$lname',phone='$phone',email='$email' where email='$email'");
        if ($a) {
            echo "<script>alert('Your profile updated successfully.');</script>";
            header('Location:../profile.php');
        }else {
            header('Location:../profile.php?update_error');
        }
    }
?>