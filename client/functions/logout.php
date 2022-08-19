<?php
    session_start();
    unset($_SESSION['email']);
    session_destroy();

    header("Location: ../clogin.php");
    exit;
?>
