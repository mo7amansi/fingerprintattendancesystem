$(document).ready(function(){
  // Get Report passenger
  $(document).on('click', '#student_log', function(){
    
    var date_sel = $('#date_sel').val();
    
    $.ajax({
      url: 'student_log_up.php',
      type: 'POST',
      data: {
        'log_date': 1,
        'date_sel': date_sel,
      },
      success: function(response){
        $.ajax({
          url: "student_log_up.php",
          type: 'POST',
          data: {
            'log_date': 1,
            'date_sel': date_sel,
            'select_date': 0,
          }
          }).done(function(data) {
          $('#studentslog').html(data);
        });
      }
    });
  });
});