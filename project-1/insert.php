<?php
include "db.php";

// form er if else
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Extract the form input data using $_POST superglobals
    //form.php er value catch or get korechi niche:
    $user = $_POST['username'];
    $roll = $_POST['roll'];
    $marks = $_POST['marks'];
    $grade = $_POST['grade'];
    $dateOfBirth = $_POST['date-of-birth'];


    // sql insert query is given below:
    if (!empty($user) && !empty($roll)) {

        $sql = "INSERT INTO student_info (Name, id, Marks, Grade, DateOfBirth) VALUES ('$user', '$roll', '$marks', '$grade', '$dateOfBirth')";
        $result = mysqli_query($conn, $sql);

        if ($result === TRUE) {
            echo "New record created successfully";
            if (!empty($user) && !empty($roll)) {
                header("Location: read.php");
                exit();
            }
        } else {
            echo "It's an error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    } else {
        echo "Vago Shiku";
    }
}




?>