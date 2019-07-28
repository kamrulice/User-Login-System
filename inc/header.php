<?php

$filepath = realpath(dirname(__FILE__));
include_Once $filepath.'/../lib/Session.php';
Session::init();


?>
<!doctype html>
<html>
	<head>
		<title>User Login Register system</title>
		<link rel="stylesheet" href="inc/bootstrap.min.css"/>
		<script src="inc/jquery.min.js"></script>
		<script type="inc/bootstrap.min.js"></script>
	</head>
	<?php

		if(isset($_GET['action']) && $_GET['action']=="Logout"){
				Session::destroy();
		}

	?>
	<body>
		<div class="container">
			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<div class="navbar-header">
						<a  class="navbar-brand" href="inedx.php">Login Register System $ PDO</a>
					</div>
						<ul class="nav navbar-nav float-right">
							<li><a href="index.php">Profile</a></li>
							<li><a href="Register.php">Register</a></li>
							<li><a href="? action = Logout">Logout</a></li>
							<li><a href="Login.php">Login</a></li>
						</ul>
				</div>
			</nav>
			