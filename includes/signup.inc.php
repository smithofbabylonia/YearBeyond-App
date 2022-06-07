<?php

if(isset($_POST["submit"])){

	$name = $_POST["pname"];
	$email = $_POST["email"];
	$username = $_POST["uid"];
	$pwd = $_POST["passw"];
	$rpwd = $_POST["rpassw"];

	require_once 'dbh.inc.php';
	require_once 'functions.inc.php';

	if(emptyInputSignUp($name,$email,$username,$pwd,$rpwd)!== false){
		header("location: ../signup.php?error=emptyinput");
		exit();
	}
	if (invalidUid($username)!==false) {
		header("location: ../signup.php?error=invaliduid");
		exit();
	}

	if (invalidEmail($email)!==false) {
		header("location: ../signup.php?error=invalidemail");
		exit();
	}

	if (pwdMatch($pwd,$rpwd)) {
		header("location: ../signup.php?error=pwdnotmatch");
		exit();
	}

	if (uidExists($conn,$username,$email)!==false) {
		header("location: ../signup.php?error=userexists");
		exit();
	}

	createUser($conn,$name,$email,$username,$pwd);

}else{
	header("location: ../signup.php");
	exit();
}