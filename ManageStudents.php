<!DOCTYPE html>
<html>

<head>
	<title>Manage Students</title>
	<link rel="stylesheet" type="text/css" href="css/managestudents.css">
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
	<script src="js/manage_students.js"></script>
	<script>
		$(document).ready(function() {
			$.ajax({
				url: "manage_students_up.php"
			}).done(function(data) {
				$('#manage_students').html(data);
			});
			setInterval(function() {
				$.ajax({
					url: "manage_students_up.php"
				}).done(function(data) {
					$('#manage_students').html(data);
				});
			}, 5000);
		});
	</script>
</head>

<body>
	<?php include 'header.php'; ?>
	<?php include 'Student_Count.php'; ?>
	<main>

		<div class="action_button">
			<button type="button" id="action_student" class="slideInDown animated" onclick="new_student()">New Student</button>
			<button type="button" id="action_student" name="student_rmo" class="student_rmo slideInDown animated">Remove Student</button>
		</div>

		<div class="alert">
			<label id="alert"></label>
		</div>


		<div id="form-style-5" class="form-style-5 slideInDown animated">
			<form>
				<div class="total_form">
					<div class="fingerprint_id">
						<fieldset>
							<legend><span class="number">1</span> Student Fingerprint ID:</legend>
							<label>Enter Fingerprint ID between 1 & 127:</label>
							<input type="number" name="fingerid" id="fingerid" placeholder="Student Fingerprint ID...">
							<div class="fingerid_button">
								<button type="button" name="fingerid_add" class="fingerid_add">Add Fingerprint ID</button>
							</div>
						</fieldset>
					</div>

					<div class="student_info">
						<fieldset>
							<legend><span class="number">2</span> Student Info</legend>
							<label>Enter Student Info:</label>
							<input type="text" name="name" id="name" placeholder="Student Name...">
							<input type="text" name="number" id="number" placeholder="Seat Number...">
							<input type="email" name="email" id="email" placeholder="Student Email...">
						</fieldset>
					</div>

					<div class="add_info">
						<fieldset>
							<legend><span class="number">3</span> Additional Info</legend>
							<label>
								<label class="time_in_label">Time In:</label>
								<input type="time" name="timein" id="timein">
								<label class="gender_label">Gender:</label>
								<input type="radio" name="gender" class="gender" value="Female">Female
								<input type="radio" name="gender" class="gender" value="Male" checked="checked">Male
							</label>
						</fieldset>
					</div>
					<div class="form_button">
						<button type="button" name="student_add" class="student_add">Add Student</button>
						<button type="button" name="student_upd" class="student_upd">Update Student</button>
						<!-- <button type="button" name="student_rmo" class="student_rmo">Remove Student</button> -->
					</div>
				</div>
			</form>
		</div>

		<div class="section">
			<!--Student table-->
			<div class="tbl-header slideInRight animated">
				<table cellpadding="0" cellspacing="0" border="0">
					<thead>
						<tr>
							<th>Finger ID</th>
							<th>Name</th>
							<th>Gender</th>
							<th>Seat Number</th>
							<th>Date</th>
							<th>Time in</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="tbl-content slideInRight animated">
				<table cellpadding="0" cellspacing="0" border="0">
					<div id="manage_students"></div>
			</div>
		</div>

	</main>


	<script src="js/hideshow.js"></script>
</body>

</html>