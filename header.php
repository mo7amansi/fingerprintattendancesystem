<?php
if (!isset($_SESSION)) {
	session_start();
}
?>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/header.css">
</head>
<header>

	<div class="topnav" id="myTopnav">

		<div class="logo-png">
			<a href="index.php">
				<img class="logo-png" src="icons/logo.png" alt="Fingerprint Attendance System">
			</a>
		</div>

		<div class="parts">
			<a href="index.php">Students List</a>
			<a href="StudentsLog.php">Students Log</a>
			<a href="ManageStudents.php">Manage Students</a>
		</div>

		<img class="logos-png" src="icons/logos.png" alt="University Logos">

		<a href="javascript:void(0);" class="icon" onclick="navFunction()">
			<i class="fa fa-bars"></i></a>
	</div>
</header>
<script>
	function navFunction() {
		var x = document.getElementById("myTopnav");
		if (x.className === "topnav") {
			x.className += " responsive";
		} else {
			x.className = "topnav";
		}
	}
</script>