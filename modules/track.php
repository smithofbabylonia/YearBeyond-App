<?php
    include_once '../header.php';
    if (isset($_SESSION["useruid"])!==true) {
        header("location: http://localhost/yearbeyond/index.php");
        exit();
    }

?>
<div class="learnersview">
<form action="../includes/tracker.inc.php" method="POST">
<h2>Your Learners</h2>
<?php
	$yebo = $_SESSION["useruid"];

	include_once '../includes/track.inc.php';
	
?>
<input type="submit" name="submit" value="Save">
<input type="submit" name="register" value="Print">
</form>
<?php
	if (isset($_GET["registered"])) {
		echo "<h6 class=\"pass\">Register recorded!</h6>";
	}
	if (isset($_GET["error"])) {
		if ($_GET["error"]=="learnernf") {
			echo "<h6 class=\"error\">Something isn't right!</h6>";
		}
		if ($_GET["error"]=="future") {
			echo "<h6 class=\"error\">Make sure you are logging a correct day!</h6>";
		}
	}
?>
</div>
<div class="learnersadd">
	<h2>Add new learner</h2>
	<form action="learner/learnerinfo.php" method="POST">
		<label>Full name : </label>
		<input type="text" name="fullname" placeholder="e.g John Doe"></label><br><br>
		<label>CEMIS no. :
		<input type="text" name="cemis" placeholder="e.g 123456JD7890"></label><br><br>
		<label>Grade :
		<select name="dropgrade" id="dropped">
			<option value=""></option>
			<option value="3">3</option>
			<option value="4">4</option>
		</select></label><br><br>
		<label>Level :
		<select name="droplevel" id="dropped">
			<option value=""></option>
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
		</select></label><br><br>
		<input type="submit" name="submit" value="Insert">
	</form>
	<?php
	if (isset($_GET["success"])) {
		echo "<h6 class=\"pass\">Learner recorded successfully</h6>";
	}
	if (isset($_GET["error"])) {
		if ($_GET["error"]=="empty") {
			echo "<h6 class=\"error\">Fill in all information!</h6>";
		}
		if ($_GET["error"]=="cemis") {
			echo "<h6 class=\"error\">Make sure CEMIS no. is correct!</h6>";
		}
		if ($_GET["error"]=="notaname") {
			echo "<h6 class=\"error\">Make sure learner's name is correct!</h6>";
		}
		if ($_GET["error"]=="stmtfail") {
			echo "<h6 class=\"error\">Something went wrong :(</h6>";
		}
	}
	?>
</div><input type="hidden" id="pageName" value="Track">
<?php
    include_once '../footer.php';