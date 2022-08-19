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
    if (isset($_POST['submit'])) {
        //-- Get Employee Data --//
        $email = $_POST['email'];
        $name = $_POST['name'];
        $role = $_POST['role'];
        // CHECK IF EMPLOYEE EMAIL EXISTS //
        $sql = "SELECT id FROM admin WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            // email already EXISTS
            echo "Oops...This email already exists!";
            // die();
        } else {
        }
        // END OF - CHECK IF EMPLOYEE EMAIL EXISTS //
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
            echo $emailErr;
            die();
            $email = $_POST['email'];
        } else {
        }
        //-- Get Employee Data --//
        //-- Insert Data Into DB --//
        $sql = "INSERT INTO admin (name, email, role, password)
        VALUES (?,?,?,?)";
        //-- Insert Data Into DB --//
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$name, $email, $role, $password]);
            header('Location:../users.php?success');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    }

    if(isset($_POST['insert']))
    {
        $role = $_POST['role'];
        //-- Insert Data Into DB --//
        $sql = "INSERT INTO role (role) 
        VALUES (?)";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$role]);
            header('Location:../role.php?success');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    }
?>
