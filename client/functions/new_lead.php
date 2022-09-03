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

    if(isset($_POST['save']))
    {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $nic = $_POST['nic'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $address = $_POST['address'];
        $gender = $_POST['gender'];
        $image_pro = $_POST['image_pro'];

        $sql = "SELECT id FROM leads WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            // email already EXISTS
            echo "Oops...This email already exists!";
            // die();
        } else {
        }
        //-- Insert Data Into DB --//
        $sql = "INSERT INTO leads (fname,lname,nic,phone,email,birthday,address,gender,image_pro) 
        VALUES (?,?,?,?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$fname, $lname, $nic, $phone, $email, $birthday, $address, $gender, $image_pro]);
            header('Location:../leads.php?success');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    }

    if(isset($_POST['insert']))
    {
        $phone = $_POST['number'];
        $name = $_POST['name'];
        $stime = $_POST['stime'];
        $etime = $_POST['etime'];
        $comment = $_POST['comment'];
        $rate = $_POST['rate'];
        $status = $_POST['status'];
        
        //-- Insert Data Into DB --//
        $sql = "INSERT INTO phone (number,name,stime,etime,comment,rate,status) 
        VALUES (?,?,?,?,?,?,?)";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$phone,$name,$stime,$etime,$comment,$rate,$status]);
            header('Location:../call.php?success');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    }

    if(isset($_POST['send']))
    {
        $subject = $_POST['subject'];
        $tasktype = $_POST['tasktype'];
        $priority = $_POST['priority'];
        $description = $_POST['description'];
        //--Insert into table--//
        $sql = "INSERT INTO ticket (subject,tasktype,priority,description)
        VALUES (?,?,?,?)";
        $stmt = $db->prepare($sql);
        try{
            $stmt->execute([$subject, $tasktype, $priority, $description]);
            header('Location:../manage-ticket.php?success');
        }catch(Exception $e){
            $e->getMessage();
            echo "Error";
        }
    }
?>