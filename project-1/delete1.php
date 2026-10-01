<?php
include ("db.php");
include ("insert.php");
if (isset($_GET["id"])) {

   echo $roll = $_GET["id"];

    $sql2 = "DELETE FROM student_info WHERE id = $roll";

    //database connection
    $result2 = mysqli_query($conn, $sql2);
}

header("Location: read.php");
exit;
?>