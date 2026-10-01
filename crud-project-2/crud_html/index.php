<?php
include 'header.php';
include("db.php");
// if ($conn->connect_error) {
//     echo "db.php is not connected";
// } else {
//     echo "db.php is connected";
// }
?>
<div id="main-content">
    <h2>All Records</h2>
    <?php
    $sql = "SELECT * FROM student JOIN studentclass WHERE student.sclass = studentclass.cid";// aita correct query where shoho
    // echo "SELECT * FROM student JOIN studentclass student.sclass = studentclass.cid"; //aita wrong query where chara, ai query dile run korbe na
    $result = mysqli_query($conn, $sql) or die("Query doesn't work");
    if (mysqli_num_rows($result) > 0) {
        ?>
        <table cellpadding="7px">
            <thead>
                <th>Id</th>
                <th>Name</th>
                <th>Address</th>
                <th>Class</th>
                <th>Phone</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?php echo $row['sid']; ?></td>
                        <td><?php echo $row['sname']; ?></td>
                        <td><?php echo $row['saddress']; ?></td>
                        <td><?php echo $row['cname']; ?></td>
                        <td><?php echo $row['sphone']; ?></td>
                        <td>
                            <a href='edit.php?id=<?= $row['sid'] ?>'>Edit</a>
                            <a href='delete-inline.php?id=<?= $row['sid'] ?>'>Delete</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    <?php } else {
        echo "<h2>No record found.</h2>";
    }
    mysqli_close($conn);
    ?>
</div>
</div>
</body>

</html>