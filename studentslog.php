<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
  <title>Students Log</title>
  <link rel="stylesheet" type="text/css" href="css/studentslog.css">
  <script>
    $(window).on("load resize ", function() {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({
        'padding-right': scrollWidth
      });
    }).resize();
  </script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">
  </script>
  <script src="js/jquery-2.2.3.min.js"></script>
  <script src="js/student_log.js"></script>
  <script>
    $(document).ready(function() {
      $.ajax({
        url: "student_log_up.php",
        type: 'POST',
        data: {
          'select_date': 1,
        }
      });
      setInterval(function() {
        $.ajax({
          url: "student_log_up.php",
          type: 'POST',
          data: {
            'select_date': 0,
          }
        }).done(function(data) {
          $('#studentslog').html(data);
        });
      }, 5000);
    });
  </script>
</head>

<body>
  <?php include 'header.php'; ?>
  <main>
    <section>

      <div class="form-style slideInDown animated">
        <form method="POST" action="Export_Excel.php">
          <div class="date-check">
            <input type="date" name="date_sel" id="date_sel">
            <button type="button" name="student_log" id="student_log">Select Date</button>
          </div>
          <input type="submit" id="export-excel-button" name="To_Excel" value="Export to Excel">
        </form>
      </div>
      <div class="tbl-header slideInRight animated">
        <table cellpadding="0" cellspacing="0" border="0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Seat Number</th>
              <th>Fingerprint ID</th>
              <th>Date</th>
              <th>Time In</th>
              <th>Time Out</th>
            </tr>
          </thead>
        </table>
      </div>
      <div class="tbl-content slideInRight animated">
        <div id="studentslog"></div>
      </div>
    </section>
  </main>
</body>

</html>