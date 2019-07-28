<?php
include 'inc/header.php';


?>
<?php
include 'lib/User.php';

$user = new User();

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['register'])){

		$userRegi = $user->userRegistration($_POST);
}


?>

<div class = "panel panel-default">
	<div class="panel panel-heading">
		<h2>User Registration</h2>
		<div class="panel body">
			<div style="max-width: 600px; margin: 0 auto">
				<div>
				<?php
					if(isset($userRegi)){
						echo $userRegi ;
					}

				?>
			</div>
			<form action="" method="POST">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="username">UserName</label>
					<input type="text" name="username" id="username" class = "form-control" />
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" name="email" id="email" class="form-control" /> 
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control"/>
				</div>
				<button type="submit" name="register" id="register" class="btn btn-success"/>Submit</button>
			</form>
		</div>
		</div>
	</div>
	

</div>

<?php
	include 'inc/footer.php';
?>