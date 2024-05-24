<?php
require_once "./db_connect.php";

if(isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];

    $sql = "DELETE FROM jeuxvidéo WHERE id = :recordid";

    $res = $conn->prepare($sql);
    $values = array(":recordid" => $id);

    $res->execute($values);

    if($res->rowCount() > 0) {
        echo "<script>alert('The game has been deleted successfully !'); window.location='index.php'; </script>";
    } else {
        echo "<script>alert('The game could not be deleted...'); window.location='index.php'; </script>";
    }
}
?>