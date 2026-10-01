<?php
//db.php page ke include/connect korlam ekhane
include("db.php");
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
</head>

<body>

    <div class="container mt-5">

        <div class="row justify-content-center">

            <div class="col-md-8">

                <div class="card shadow">

                    <div class="card-body p-3">

                        <h2 class="text-center mb-3">
                            Student Information Page
                        </h2>

                        <form action="insert.php" method="POST">

                            <!-- Student name -->
                            <div class="mb-1">
                                <label class="form-label">Student Name:<span style="color: red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                                    <input type="text" name="username" placeholder="Enter Student Name"
                                        class="form-control">
                                </div>

                            </div>

                            <!-- roll -->
                            <div class="mb-1">
                                <label class="form-label">Roll:<span style="color:red">*</span></label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                    <input type="text" name="roll" placeholder="Enter Roll" class="form-control">
                                </div>
                            </div>

                            <!-- marks -->
                            <div class="mb-1">
                                <label class="form-label">Marks:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-journal-check"></i></span>
                                    <input type="number" name="marks" placeholder="Enter Marks" class="form-control"
                                        required>
                                </div>
                            </div>

                            <!-- grade -->
                            <div class="mb-1">
                                <label class="form-label">Grade:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-mortarboard"></i></span>
                                    <input type="text" name="grade" placeholder="Enter Grade" class="form-control"
                                        required>
                                </div>
                            </div>

                            <!-- date of birth -->
                            <div class="mb-3">
                                <label class="form-label">Date of Birth:</label>
                                <div class="input-group">
                                    <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>
                                    <input type="date" name="date-of-birth" class="form-control" required>
                                </div>
                            </div>

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