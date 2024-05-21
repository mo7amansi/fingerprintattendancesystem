<!DOCTYPE html>
<html>

<head>
  <title>Fingerprint Attendance System</title>
  <link rel="stylesheet" type="text/css" href="css/Students.css">
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
</head>

<body>
  <?php include 'header.php'; ?>
  <?php include 'Student_Count.php'; ?>
  <main>
    <section>
      <!--Student table-->
      <div class="tbl-header slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Seat Number</th>
              <th>Gender</th>
              <th>Finger ID</th>
              <th>Date</th>
              <th>Time In</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
          <tbody>
            <?php

            require 'connectDB.php';

            $sql = "SELECT * FROM students WHERE NOT studentname='' ORDER BY id DESC";
            $result = mysqli_stmt_init($conn);
            if (!mysqli_stmt_prepare($result, $sql)) {
              echo '<p class="error">SQL Error</p>';
            } else {
              mysqli_stmt_execute($result);
              $resultl = mysqli_stmt_get_result($result);
              if (mysqli_num_rows($resultl) > 0) {
                while ($row = mysqli_fetch_assoc($resultl)) {
            ?>
                  <TR>
                    <TD><?php echo $row['studentname']; ?></TD>
                    <TD><?php echo $row['seatnumber']; ?></TD>
                    <TD><?php echo $row['gender']; ?></TD>
                    <TD><?php echo $row['fingerprint_id']; ?></TD>
                    <TD><?php echo $row['student_date']; ?></TD>
                    <TD><?php echo $row['time_in']; ?></TD>
                  </TR>
            <?php
                }
              }
            }
            ?>
          </tbody>
        </table>
      </div>
    </section>
  </main>
</body>

</html>