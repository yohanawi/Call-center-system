<?php
    require_once "db.php";
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM phone WHERE id=?";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$id]);
            header('Location:../log.php?deleted');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    } else {
        header('Location:../log.php?del_error');
    }
?>