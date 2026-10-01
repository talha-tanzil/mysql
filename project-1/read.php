<?php
//database connect kora
include("db.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Read Data</title>
    <style>
        table {
            width: 80%;
            margin: 50px auto;
            /* border-collapse: collapse; */

        }

        th,
        td {
            border: 1px solid red;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-top: 30px;
            /* font-family: Arial, sans-serif; */
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <h2>Student Data</h2>

    <table>
        <thead>
            <tr>
                <th>Roll</th>
                <th>Name</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Date of Birth</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $sql = "SELECT * FROM student_info";
            $result = mysqli_query($conn, $sql);
            echo "Read connected";
            if ($result->num_rows > 0) {
                while ($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['Name']; ?></td>
                        <td><?= $row['Marks']; ?></td>
                        <td><?= $row['Grade']; ?></td>
                        <td><?= $row['DateOfBirth']; ?></td>
                        <td>
                            <a class='btn btn-primary btn-sm' href="update.php?id=<?php echo $row['id']; ?>">Update</a>
                            <a class='btn btn-danger btn-sm' href="delete1.php?id=<?php echo $row['id']; ?>">Delete</a>
                        </td>
                    </tr>
                <?php }
            } ?>
        </tbody>
    </table>

</body>

</html>