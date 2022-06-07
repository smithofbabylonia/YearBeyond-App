<?php
	include_once 'header.php';
	if (isset($_SESSION["useruid"])) {
        header("location: http://localhost/yearbeyond/index.php");
        exit();
	}
?>
		<div class="login">
			<h2>Login</h2>
			<form action="includes/login.inc.php" method="post">
				<p>Username</p>
				<input type="text" name="uid" placeholder="Enter username/email">
				<p>Password</p>
				<input type="password" name="pwd" placeholder="Enter password">
				<p></p>
				<input type="submit" name="submit" value="Login">
				<p><a href="#">Lost password?</a></p>
			</form>
<?php
	if (isset($_GET["error"])) {
		if ($_GET["error"]=="wrongid") {
			echo "<p class=\"error\">Make sure the username is correct!</p>";
		}
		if ($_GET["error"]=="wrongpwd") {
			echo "<p class=\"error\">Password is incorrect!</p>";
		}
		if ($_GET["error"]=="empty") {
			echo "<p class=\"error\">Please enter your login details!</p>";
		}
	}
?>
		</div>
		<input type="hidden" id="pageName" value="Login">
<?php
	include_once 'footer.php';
?>