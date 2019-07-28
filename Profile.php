<?php
	include 'inc/header.php'; 
	include 'lib/User.php';


	?>
<?php

if(isset($_GET['id'])){
	$userId = (int)$_GET['id'];
}
$user = new User();

?>

<div class="panel panel-default">
	<div class="panel panel-heading">
		<h2>User Profile<span class="float-right"><a href="index.php" class="btn btn-primary">Back</a></span></h2>
		<div class="panel-body">
			<div style="max-width:600px ; margin: 0 auto">
				<?php
				$userdata =$user->GetUserById($userId);
				if($userdata){
						
				?>
	
			<form action="" method="POST">
				<div class="form-group">
					<label for="name">Your Name</label>
					<input type="text" name="name" id="name" value="<?php echo $userdata->name ; ?>" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="username">UserName</label>
					<input type="text" name="username" id="username" value="<?php echo $userdata->username ; ?>" class="form-control"/>
				</div>
				<div class="form-group">
					<label for="email">Email Address</label>
					<input type="email" name="email" id="email" value="<?php echo $userdata->email ; ?>" class="form-control"/>
				</div>
				<button type="submit" name="submit" id="Profile" class="btn btn-success">Update</button>
			</form>
			<?php } ?>
		</div>
		</div>
	</div>
</div>

<?php

	include 'inc/footer.php';
?>