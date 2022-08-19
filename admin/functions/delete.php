<?php
    require_once "db.php";
    if (isset($_POST["id"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM role WHERE id=?";
        $stmt = $db->prepare($sql);
        try {
            $stmt->execute([$id]);
            header('Location:../role.php?deleted');
        } catch (Exception $e) {
            $e->getMessage();
            echo "Error";
        }
    } else {
        header('Location:../role.php?del_error');
    }
?>