<?php
include("db.php");
$stu_id= $_GET['id'];
$sql = "DELETE FROM student where sid= '$stu_id'"; 
$result = mysqli_query($conn, $sql);
header ("Location: index.php");
mysqli_close($conn);

?>