
<?php
include 'inc/header.php';
include 'lib/User.php';
$user = new User();

?>
<?php

$loginmsg = Session::get("loginmsg");
	if(isset($loginmsg)){
		echo $loginmsg ;
	}
	Session::set("loginmsg",NUll);


?>
<div class="panel panel-default">
				<div class="panel-heading">
					<h2>User list<span class="float-right"><strong>Welcome !</strong></strong>

					<?php

				$name = Session::get("name");
				if(isset($name)){
					echo $name ;
				}
					?>
				</span></h2>
					
				</div>

				<div class="panel-body">
					<table class="table table-striped">
						<th width="20%">Serial</th>
						<th width="20%">Name</th>
						<th width="20%">Username</th>
						<th width="20%">Email Address</th>
						<th width="20%">Action</th>
						<?php
							$user = new User();
							$userdata = $user->getUserData();
							if($userdata){
								$i = 0;

							foreach ($userdata as $data) {
								$i++;

						?>
					<tr>
						<td><?php echo $i ;?></td>
						<td><?php echo $data['name'] ;?></td>
						<td><?php echo $data['username'] ;?></td>
						<td><?php echo $data['email'] ;?></td>
						<td>
							<a class="btn btn-primary" href="Profile.php ? id= <?php echo $data['id'] ; ?>">View</a>
						</td>
					</tr>

					<?php } }?>
						<tr>
						<td>02</td>
						<td>Abir Hasan</td>
						<td>Abir</td>
						<td>Abirhasan@gmail.com</td>
						<td>
							<a class="btn btn-primary" href="Profile.php" id=1>View</a>
						</td>
					</tr>
						<tr>
						<td>03</td>
						<td>Rony Hasan</td>
						<td>Rony</td>
						<td>Ronyhasan@gmail.com</td>
						<td>
							<a class="btn btn-primary" href="Profile.php" id=1>View</a>
						</td>
					</tr>
					</table>
				</div>
			</div>
			Body-text
			<?php
				include 'inc/footer.php';
			?>
			