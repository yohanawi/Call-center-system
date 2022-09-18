<?php
    require_once "db.php";
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM agent WHERE id=?";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$id]);
            header('Location:../agent.php?deleted');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    } else {
        header('Location:../agent.php?del_error');
    }
?>