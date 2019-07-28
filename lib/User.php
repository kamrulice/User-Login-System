<?php

include 'Database.php';
include_once'Session.php';



class User{
	private $db;
	public function __construct(){
		$this->db = new Database();
	}
	public function userRegistration($data){
		$name     = $data['name'];
		$username = $data['username'];
		$email    = $data['email'];
		$password =  md5( $data['password']);
		if(strlen($password)<6){
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong>password must be al least 5 characters </div>";
			return $msg ;
		}
		$checkmail= $this->checkmail($email);

		if($name =="" or $username =="" or $email=="" or $password == ""){
			$msg = "<div class='alert alert-danger'><strong>Error  </strong>Field must not be empty</div>";
			return $msg ;
		}
		if(strlen($username)<3){
				$msg = "<div class = 'alert alert-danger'><strong>Error !</strong>username must be at least 3 characters</div>";

				return $msg ;
		}

			elseif(preg_match('/[^a-z0-9_-]+/i', $username)){
			$msg = "<div class ='alert alert-danger'><strong>Error !</strong>username must be contain alphanumerical dashes and underscores !</div>";
		}
		if(filter_var($email, FILTER_VALIDATE_EMAIL == false)){
			$msg = "<div class='alert alert-danger'><strong>Error</strong>Email address is not valid</div>";
			return $msg ;
		}
		if($checkmail == true){
			$msg = "<div class='alert alert-danger'><strong>Error</strong>Email address is already exist </div>";
			return $msg ;
		}
		$sql = "INSERT INTO db_info(name, username, email, password) VALUES(:name, :username, :email, :password)";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':name',$name);
		$query->bindValue(':username',$username);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$result = $query->execute();
		if(isset($result)){
			$msg = "<div class ='alert alert-success'><strong>successfull ! </strong>Thank you ,you have been register ! </div>";
			return $msg ;
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Problem insering your details </div>";
			return $msg ;
		}
	}

    	public function checkmail($email){
		$sql = "SELECT email FROM db_info WHERE email=:email";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->execute();
		if($query->rowCount()>0){
			return true ;
		}
		else{
			return false ;
		}
	}
	public function getLoginUser( $email, $password){
		$sql = "SELECT * FROM db_info WHERE email = :email AND password = :password ";
		$query = $this->db->pdo->prepare($sql);
		$query->bindValue(':email',$email);
		$query->bindValue(':password',$password);
		$query->execute();
		$result = $query->fetch(PDO::FETCH_OBJ);
		return $result ;
	}

	public function userlogin($data){
		$email = $data['email'];
		$password = $data['password'];
		$checkmail= $this->checkmail($email);

		if($email=="" or $password == ""){
			$msg = "<div class = 'alert alert-danger'><strong>Error ! </strong>Please enter your email and password </div>";
			return $msg ;
		}
		if($checkmail == false){
			$msg = "<div class='alert alert-danger'><strong>Error</strong>Email address is already exist </div>";
			return $msg ;
	}
	if(filter_var($email,FILTER_VALIDATE_EMAIL)===false){
			$msg = "<div class='alert alert-danger'><strong>Error</strong>Email address is already exist </div>";
			return $msg ;
	}
	
	  $result = $this->getLoginUser($email,$password);
		if($result){
			Session::init();
			Session::set("login",true);
			Session::set("id",$result->id);
			Session::set("name",$result->name);
			Session::set("username",$result->username);
			Session::set("loginmsg","<div class='alert alert-success'><strong>Success ! </strong>Your are loggin</div>");
			header("location:index.php");
		}else{
			$msg = "<div class='alert alert-danger'><strong>Error ! </strong>Data not found</div>";
			return $msg ;
		}
}
public function getUserData(){
	$sql = "SELECT * FROM db_info";
	$query= $this->db->pdo->prepare($sql);
	$query->execute();
	$result = $query->fetchAll();
	return $result ;
}
public function getUserById($id){
	$sql = "SELECT * FROM db_info WHERE id = :id";
	$query= $this->db->pdo->prepare($sql);
	$query->bindValue(':id',$id);
	$query->execute();
	$result = $query->fetch(PDO::FETCH_OBJ);
	return $result ;
}
    

}

?>