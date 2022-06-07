<?php
	include_once 'header.php';
	if (isset($_SESSION["useruid"])) {
        header("location: http://localhost/yearbeyond/index.php");
        exit();
	}
?>
		<section class="signup">
			<div class="login">
				<h2>Sign up</h2>
				<form action="includes/signup.inc.php" method="POST">
					<input type="text" name="pname" placeholder="Enter full name...">
					<input type="email" name="email" placeholder="Enter email...">
					<input type="text" name="uid" placeholder="Enter username...">
					<input type="password" name="passw" placeholder="Enter Password...">
					<input type="password" name="rpassw" placeholder="Enter Password again">
					<input type="submit" name="submit" value="Submit">
				</form>
				<?php
					if (isset($_GET["error"])) {
						if ($_GET["error"] == "emptyinput") {
							echo "<p class=\"error\">Fill in all the fields!</p>";
						}
						if ($_GET["error"] == "invaliduid") {
							echo "<p class=\"error\">Choose a proper username!</p>";
						}
						if ($_GET["error"] == "invalidemail") {
							echo "<p class=\"error\">Enter a proper email address!</p>";
						}
						if ($_GET["error"] == "pwdnotmatch") {
							echo "<p class=\"error\">Passwords dont match</p>";
						}
						if ($_GET["error"] == "stmtfailed") {
							echo "<p class=\"error\">Something went wrong!</p>";
						}
						if ($_GET["error"] == "userexists") {
							echo "<p class=\"error\"> Choose a different username</p>";
						}
					}
					if (isset($_GET["success"])) {
						echo "<p class='pass'>Account created, try logging in</p>";
					}
				?>
				</div>
		</section>
		<input type="hidden" id="pageName" value="SignUp">
<?php
	include_once 'footer.php';
?>