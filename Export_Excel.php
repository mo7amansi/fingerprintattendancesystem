<?php
//Connect to database
require 'connectDB.php';

$output = '';

if(isset($_POST["To_Excel"])){
  
    if ( empty($_POST['date_sel'])) {

        $Log_date = date("Y-m-d");
    }
    else if ( !empty($_POST['date_sel'])) {

        $Log_date = $_POST['date_sel']; 
    }
        $sql = "SELECT * FROM students_logs WHERE checkindate='$Log_date' ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows > 0){
            $output .= '
                        <table class="table" bordered="1">  
                          <TR>
                            <TH>Name</TH>
                            <TH>Seat Number</TH>
                            <TH>Fingerprint ID</TH>
                            <TH>Date log</TH>
                            <TH>Time In</TH>
                            <TH>Time Out</TH>
                          </TR>';
              while($row=$result->fetch_assoc()) {
                  $output .= '
                              <TR> 
                                  <TD> '.$row['studentname'].'</TD>
                                  <TD> '.$row['seatnumber'].'</TD>
                                  <TD> '.$row['fingerprint_id'].'</TD>
                                  <TD> '.$row['checkindate'].'</TD>
                                  <TD> '.$row['timein'].'</TD>
                                  <TD> '.$row['timeout'].'</TD>
                              </TR>';
              }
              $output .= '</table>';
              header('Content-Type: application/xls');
              header('Content-Disposition: attachment; filename=Students_Log'.$Log_date.'.xls');
              
              echo $output;
              exit();
        }
        else{
            header( "location: studentslog.php" );
            exit();
        }
}
?>