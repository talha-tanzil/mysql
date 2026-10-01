<?php
include("db.php");
//Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
$user = '';
$roll = '';
$marks = '';
$grade = '';
$dateOfBirth = '';
$errorMessage2 = '';
$successMessage2 = '';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    // GET method: show data of the client
    if (!isset($_GET['id'])) {

        header("Location: index.php");
        exit();
    }
    $roll = $_GET['id'];
    // read the row of the selected client from database table
    $sql2 = "SELECT * FROM student_info where `id`= $roll";
    $result2 = mysqli_query($conn, $sql2);

    // $row = $result2->fetch_assoc();
    $row = mysqli_fetch_assoc($result2);
    // print_r($row);
    if (!$row) {
        header("Location: read.php");
        exit();
    }
    $user = $row['Name'];
    $roll = $row['id'];
    $marks = $row['Marks'];
    $grade = $row['Grade'];
    $dateOfBirth = $row['DateOfBirth'];
} else {
    // post method: Update the data of the student_info of form.php
    $roll = $_POST['roll'];
    $user = $_POST['username'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $dateOfBirth = $_POST['date-of-birth'];
    // echo 'ok';
    do {
        if (empty($user) || empty($marks) || empty($grade) || empty($dateOfBirth)) {
            $errorMessage2 = "All the fields are required.";
            break;
        }

        $sql3 = "UPDATE student_info " . "SET `Name` = '$user', `Marks` ='$marks', `Grade`= '$grade', DateOfBirth = '$dateOfBirth' " . "WHERE `id` = '$roll'";
        echo $sql3;
        $result3 = mysqli_query($conn, $sql3);
        if (!$result3) {
            $errorMessage2 = "Invalid query: " . $conn->error;
            break;
        }
        $successMessage2 = "Client added successfully";
        header("Location: read.php");
        exit();
    } while (true);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.13.1/font/bootstrap-icons.min.css"
        integrity="sha512-t7Few9xlddEmgd3oKZQahkNI4dS6l80+eGEzFQiqtyVYdvcSG2D3Iub77R20BdotfRPA9caaRkg1tyaJiPmO0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-body p-3">

                        <h2 class="text-center mb-3">
                            Student Information Update
                        </h2>
                        <?php
                        if (!empty($errorMessage2)) {
                                        echo "<div class= 'alert alert-warning alert-dismissible show' role='alert'>
                                            <strong>$errorMessage2</strong>
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label=''close></button>
                                        </div>";
                                                        }

                        ?>

                        <form method="POST">

                            <!-- Student name -->
                            <div class="mb-1">
                                <label class="form-label">Student Name:<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="username" value="<?php echo $user ?>"
                                        placeholder="Enter Student Name" class="form-control">
                                </div>

                            </div>


                            <div class="mb-1">
                                <label class="form-label">Roll:<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                    <input type="text" name="roll" value="<?php echo $roll ?>" placeholder="Enter Roll"
                                        class="form-control">
                                </div>
                            </div>

                            <!-- marks -->
                            <div class="mb-1">
                                <label class="form-label">Marks:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-journal-check"></i></span>
                                    <input type="number" name="marks" placeholder="Enter Marks"
                                        value="<?php echo $marks ?>" class="form-control" required>
                                </div>
                            </div>

                            <!-- grade -->
                            <div class="mb-1">
                                <label class="form-label">Grade:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                    <input type="text" name="grade" value="<?php echo $grade ?>"
                                        placeholder="Enter Grade" class="form-control" required>
                                </div>
                            </div>

                            <!-- date of birth -->
                            <div class="mb-3">
                                <label class="form-label">Date of Birth:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="date-of-birth" value="<?php echo $dateOfBirth ?>"
                                        class="form-control" required>
                                </div>
                            </div>
                            <?php
                            if (!empty($successMessage2)) {
                                echo "<div class= 'alert alert-success alert-dismissible show' role='alert'>
                                <strong>$successMessage2</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label=''close></button>
                            </div>";
                                                }
                            ?>

                            <!-- Buttons -->
                            <div class="btn-group btn-group-sm col-md-2 float-end gap-2">

                                <!-- reset button -->
                                <button type="reset" class="btn btn-sm btn-warning col-md-4" title="Reset Button">
                                    <i class="bi bi-arrow-clockwise"></i>
                                </button>

                                <!-- submit button -->
                                <button type="submit" class="btn btn-sm btn-danger col-md-4" title="Submit Button">
                                    <i class="bi bi-send"></i>
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>