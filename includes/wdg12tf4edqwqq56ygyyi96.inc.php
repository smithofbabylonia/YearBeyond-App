<?php
# books
session_start();
if (isset($_SESSION['useruid'])) {
    if (isset($_POST['submit'])) {
        include_once 'dbh.inc.php';
        include_once 'functions.inc.php';

        $bookList = $_POST['listing'];
        $learner = $_POST['cemis'];

        if (updateBooks($conn,$learner,$bookList)) {
            header("location: ../modules/learner/learner.php?cemis=".$learner."&update=books");
		    exit();
        }
    }
    header("location: ../modules/learner/learner.php?cemis=".$learner."&update=failed");
	exit();
}