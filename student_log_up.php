<?php
session_start();
?>
<table cellpadding="0" cellspacing="0" border="0">
  <tbody>
    <?php

    require 'connectDB.php';

    if (isset($_POST['log_date'])) {
      if ($_POST['date_sel'] != 0) {
        $_SESSION['seldate'] = $_POST['date_sel'];
      } else {
        $_SESSION['seldate'] = date("Y-m-d");
      }
    }

    if ($_POST['select_date'] == 1) {
      $_SESSION['seldate'] = date("Y-m-d");
    } else if ($_POST['select_date'] == 0) {
      $seldate = $_SESSION['seldate'];
    }

    $sql = "SELECT * FROM students_logs WHERE checkindate='$seldate' ORDER BY id DESC";
    $result = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($result, $sql)) {
      echo '<p class="error">SQL Error</p>';
    } else {
      mysqli_stmt_execute($result);
      $resultl = mysqli_stmt_get_result($result);
      if (mysqli_num_rows($resultl) > 0) {
        $number = 1;
        while ($row = mysqli_fetch_assoc($resultl)) {
    ?>
          <TR>
            <TD><?php echo $number; ?></TD>
            <TD><?php echo $row['studentname']; ?></TD>
            <TD><?php echo $row['seatnumber']; ?></TD>
            <TD><?php echo $row['fingerprint_id']; ?></TD>
            <TD><?php echo $row['checkindate']; ?></TD>
            <TD><?php echo $row['timein']; ?></TD>
            <TD><?php echo $row['timeout']; ?></TD>
          </TR>

    <?php
          $number++;
        }
      }
    }
    ?>
  </tbody>
</table>