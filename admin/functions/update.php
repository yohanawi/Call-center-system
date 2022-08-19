<?php
    /* DATABASE CONNECTION*/
    require_once "db.php";
    /*DATABASE CONNECTION */
    if (isset($_POST['update'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
       
        $a = mysqli_query($connection, "UPDATE admin SET name='$name',email='$email' where email='$email'");
        if ($a) {
            echo "<script>alert('Your profile updated successfully.');</script>";
            header('Location:../profile.php');
        }else {
            header('Location:../profile.php?update_error');
        }
    }

    if (isset($_POST['edit'])) {
        $admin_remark = $_POST['admin_remark'];
        $status = $_POST['status'];
        $id = $_POST['id'];
        mysqli_query($connection, "UPDATE ticket SET admin_remark='$admin_remark', status='closed' where id='$id'");
        
        echo '<script>alert("Ticket has been updated.")</script>';
        header('Location:../manage-ticket.php');
    }
    
    if (isset($_POST['up'])) {
        $assign = $_POST['assign'];
        mysqli_query($connection, "UPDATE leads SET assign='$assign'");
        
        echo '<script>alert("active account.")</script>';
        header('Location:../access.php');
    }
?>