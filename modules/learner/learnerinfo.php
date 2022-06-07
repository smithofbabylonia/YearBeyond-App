<?php
    session_start();
    if (isset($_SESSION["useruid"])) {
        #echo $_SESSION["useruid"];
    }else {
        header("location: ../../../yearbeyond/login.php");
        exit();
    }
    if (isset($_POST["submit"])) {

        $yebo = $_SESSION["useruid"];
        $learnername = $_POST["fullname"];
        $grade = $_POST["dropgrade"];
        $level = $_POST["droplevel"];
        $cemis = $_POST["cemis"];

        include_once '../../includes/dbh.inc.php';
        include_once '../../includes/functions.inc.php';

        if (emptyInputLearn($learnername,$grade,$level,$cemis) !==false) {
            header("location: ../track.php?error=empty"); #not absolute
            exit();
        }
        if (notName($learnername)!==false) {
            header("location: ../track.php?error=notaname"); #not absolute
            exit();
        }
        if (notCemis($cemis)!==false) {
            header("location: ../track.php?error=cemis"); #not absolute
            exit();
        }
        if (learnerExists($conn,$learnername)!==false) {
            header("location: ../track.php?error=empty"); #not absolute
            exit();
        }
        insertLearner($conn,$cemis,$yebo,$learnername,$grade,$level);
    }else {
        header("location: ../../yearbeyond/modules/track.php?error=unknown");
        exit();
    }