<?php
include("connectDB.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/Students.css">
</head>

<body>
    <section>
        <div class="total_student_section slideInRight animated">

            <h1 class="total-num-style">
                <img src="icons/student-icon.png" alt="Icon" class="icon">
                Total Number of Students:
            </h1>

            <div class="total_students">
                <?php

                $sql = "SELECT * from students";
                if ($result = mysqli_query($conn, $sql)) {

                    $rowcount = mysqli_num_rows($result);

                    echo "$rowcount Students";
                }

                ?>
            </div>
        </div>
    </section>
</body>

</html>