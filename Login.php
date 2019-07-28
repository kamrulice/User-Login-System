<?php
	include 'inc/header.php';
	include 'lib/User.php';
?>
<?php
$user = new User();
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['login'])){
	$userlogin = $user->userlogin($_POST);
}
?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>User Login</h2>
		<div class="panel-body">
			<div style="max-width:600px; margin: 0 auto">
				<div>
					<?php
						if(isset($userlogin)){
							echo $userlogin ;
						}

					?>
				</div>
			<form action="" method="POST">
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="text" name="email" id="email" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" name="password" id="password" class="form-control"  />
				</div>
				<button type="submit" name="login" id="login" class="btn btn-success">Login</button>
			</form>
		</div>
			
		</div>
	</div>
</div>
























<?php
	include 'inc/footer.php';
?>