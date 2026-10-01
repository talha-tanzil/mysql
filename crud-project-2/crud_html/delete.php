<?php include 'header.php';
include_once("db.php");
if (isset($_POST['deletebtn'])) {
    $stu_id = $_POST['sid'];
    $sql = "DELETE FROM student where sid= '$stu_id'";
    $result = mysqli_query($conn, $sql);
    header("Location: index.php");
    mysqli_close($conn);
}
?>

<div id="main-content">
    <h2>Delete Record</h2>
    <form class="post-form" action="" method="post">
        <div class="form-group">
            <label>Id</label>
            <input type="text" name="sid" />
        </div>
        <input class="submit" type="submit" name="deletebtn" value="Delete" />
    </form>
</div>
</div>
</body>

</html>